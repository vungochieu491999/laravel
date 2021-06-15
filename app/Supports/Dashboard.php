<?php

namespace App\Supports;

use App\Models\User;

class Dashboard
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param User $user
     * @return array
     */
    public function getServiceAccess(User $user)
    {
        $response = [];

        return $response;
    }
}
