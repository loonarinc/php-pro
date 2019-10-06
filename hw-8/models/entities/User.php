<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class User extends DataEntity
{
    public $id;
    public $login;
    public $pass;
    public $hash;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $pass
     * @param $hash
     */
    public function __construct($id = null, $login = null, $pass = null, $hash = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }


}