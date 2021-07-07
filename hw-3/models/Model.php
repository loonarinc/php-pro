<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert($params)
    {
        $tableName = $this->getTableName();
        $array = [];
        foreach ($this as $key => $value)
            if (($key !== 'id') and ($key !== 'db'))
                array_push($array, $key);
        $fields = implode(',', $array);
        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES (:params);";
        return($this->db->execute($sql, ['params' => $params]));

    }

    public function delete($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function update($id)
    {
        $tableName = $this->getTableName();
        $array = [];
        $params = ['id' => $id];
        foreach ($this as $key => $value)
            if (($key !== 'id') and ($key !== 'db'))
                array_push($array, $key );
        $fields = implode(',', $array);
        $sql = "UPDATE {$tableName} SET ".pdoSet($fields,$params)." WHERE id = :id";
        return $this->db->queryOne($sql,['id' => $id]);
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}