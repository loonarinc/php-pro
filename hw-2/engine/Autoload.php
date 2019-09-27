<?php

class Autoload
{
//    private $path = [
//        'models',
//        'engine',
//        'interfaces'
//    ];

    public function loadClass($className)
    {
        $str = str_replace("\\", "/", $className);
        $str = str_replace("app/", "", $str);
        //foreach ($this->path as $path) {
            $fileName = "../{$str}.php";
            if (file_exists($fileName)) {
                include $fileName;
                //break;
            }
        //}
    }
}