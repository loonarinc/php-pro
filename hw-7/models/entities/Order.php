<?php


namespace app\models\entities;

use app\models\entities\DataEntity;

class Order extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $adres;
    public $session_id;
    public $status;
    public $dt_start;

    /**
     * Order constructor.
     * @param $name
     * @param $phone
     * @param $adres
     * @param $session_id
     * @param $status
     * @param $dt_start
     */
    public function __construct($name = null, $phone = null, $adres = null, $session_id = null, $status = null, $dt_start = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->adres = $adres;
        $this->session_id = $session_id;
        $this->status = $status;
        $this->dt_start = $dt_start;
    }
}