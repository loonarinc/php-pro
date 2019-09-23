<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{
    public function getLimit($from, $to) {

    }

    public function getWere($name, $value) {
    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($this as $key => $value) {
            if ($key === "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }
    public function update() {
        //TODO реализовать умный update (цикл по state)
        $tableName = static::getTableName();
        $array = [];
        foreach ($this->state as $key => $value)
            if($value){
                array_push($array, $key . ' = ?');
            }
        $params = implode(", ", $array);
        $sql = "UPDATE {$tableName} SET {$params} WHERE id = :id;";
        $a = Db::getInstance()->prepareQuery($sql);
        $i = 1;
        foreach ($this->state as $key => $value) {
            if ($value){
                if($key == "id" or $key == "price" or $key == "quantity"){//пока без автоматики(
                    $a->bindValue($i, $this->$key, \PDO::PARAM_INT);
                    var_dump($i);
                    var_dump($this->$key);
                }else {
                    $a->bindValue($i, $this->$key, \PDO::PARAM_STR);
                    var_dump($i);
                    var_dump($this->$key);
                    var_dump($a);
                }
            }
        }
        var_dump($this->id);
        $a->bindParam(':id', $this->id, \PDO::PARAM_INT);
        var_dump($a);
        //$a->execute();
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

}