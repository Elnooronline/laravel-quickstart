<?php

namespace App\Models\Helpers;

trait UserHelpers
{
    /**
     * Determine wether the user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type == static::ADMIN_TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function getImagePlaceholder()
    {
        return url('images/user.png');
    }
}
