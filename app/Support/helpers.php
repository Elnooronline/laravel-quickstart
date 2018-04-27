<?php

if (! function_exists('filter_html')) {
    /**
     * Remove dangerous tags (with attributes) from html.
     *
     * @param  string $html
     *
     * @return string
     */
    function filter_html($html, $defaultAllowed = null)
    {
        if (! $defaultAllowed) {
            $defaultAllowed = 'div,img[src],a[href|title],blockquote[cite],h1,h2,h3,h4,h5,b,i,tt,hr,strong,span,s,p,code,pre,em,ul,ol,li,table,thead,tbody,tr,td,th,br,*[style|class]';
        }

        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8');
        $allowed = config('editor.allowed_tags', $defaultAllowed);

        // put here every tag and attribute that you want to pass through
        //            $config->set('HTML.AllowedAttributes', '*.style');
        $config->set('HTML.Allowed', $allowed);

        $purifier = new HTMLPurifier($config);

        // return the filtered elements.
        return $purifier->purify($html);
    }
}

if (! function_exists('notification_target')) {
    /**
     * The target collection for the given notifications.
     *
     * @param \Illuminate\Notifications\DatabaseNotification $notification
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    function notification_target($notification)
    {
        if (auth()->guest()) {
            return collect();
        }

        if (! auth()->user()->relationLoaded('notifications')) {
            auth()->user()->load('notifications');
        }
        $targets = auth()->user()->notifications->groupBy('data.target_type');

        $result = [];
        foreach ($targets as $class => $target) {
            $keyName = (new $class)->getKeyName();
            $keys = $target->pluck('data.target_key');
            $result[$class] = $class::whereIn($keyName, $keys->toArray())->get();
        }

        if ($notification instanceof \Illuminate\Notifications\DatabaseNotification) {
            $data = $result[$notification->data['target_type']];
        } else {
            $notification = \Illuminate\Notifications\DatabaseNotification::find($notification);
        }
        if (! $notification) {
            return;
        }
        $data = $result[$notification->data['target_type']];

        $keyName = (new $notification->data['target_type'])->getKeyName();
        $key = $notification->data['target_key'];

        return $data->where($keyName, $key)->first();
    }
}
