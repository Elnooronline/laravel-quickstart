<!-- Messages: style can be found in dropdown.less-->
<adminlte-notifications
        translation="{{ json_encode(trans('notifications')) }}"
        route="{{ route('notifications', [
            'notification_type' => 'dashboard',
            'limit' => '5',
        ]) }}"
></adminlte-notifications>