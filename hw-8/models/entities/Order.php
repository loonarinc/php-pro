<?php


namespace app\models\entities;

use app\models\entities\DataEntity;

class Order extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $session_id;
    public $status;
    public $dt_start;

    /**
     * Order constructor.
     * @param $id
     * @param $name
     * @param $phone
     * @param $email
     * @param $session_id
     * @param $status
     * @param $dt_start
     */
    public function __construct($name = null, $phone = null, $email = null, $session_id = null, $status = null, $dt_start = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->session_id = $session_id;
        $this->status = $status;
        $this->dt_start = $dt_start;
    }
}