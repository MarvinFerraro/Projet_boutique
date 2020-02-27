<?php
require 'Client.php';
class ListeClient
{
    public $ls_users = [];

    public function __construct($ls_users)
    {
        foreach ($ls_users as $users) {
            $user = new Client($users['id'], $users['name'], $users['email'], $users['adress'],
                $users['postal_code'], $users['city']);
            $this->ls_users[] = $user;
        }
    }

    public function getLs_users()
    {
        return $this->ls_users;
    }
}