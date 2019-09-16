<?php

namespace app\models;

class Orders extends Model
{
    public $id;
    public $session_id;
    public $user_id;
    public $status;
    public $dt_start;

    public function getTableName()
    {
        return 'Orders';
    }
}
