<?php
class Car{
    public $manufacturer;
    public $model;
    public $year;
    public $type;
    public $size;
    public $weight;
    public $price;
    public $country;
    public $drive; //тип привода
    public $steering; //руль слева или справа


    public function __construct($manufacturer, $model, $year, $type, $size, $weight, $price, $country, $drive, $steering)
    {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->year = $year;
        $this->type = $type;
        $this->size = $size;
        $this->weight = $weight;
        $this->price = $price;
        $this->country = $country;
        $this->drive = $drive;
        $this->steering = $steering;
    }
    public function showCar()
    {
        echo
            "<b>Производитель:</b> $this->manufacturer<br>
            <b>Модель:</b> $this->model<br>
            <b>Год выпуска:</b> $this->year<br>
            <b>Тип:</b> $this->type<br>
            <b>Размер:</b> $this->size<br>
            <b>Масса:</b> $this->weight кг<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Страна-производитель:</b> $this->country<br>
            <b>Тип привода:</b> $this->drive<br>
            <b>Рулевое управление:</b> $this->steering<br>";
    }
}
class SpecialCar extends Car{
    public $specialFeature;

    public function __construct($manufacturer, $model, $year, $type, $size, $weight, $price, $country, $drive, $steering, $specialFeature)
    {
        parent::__construct($manufacturer, $model, $year, $type, $size, $weight, $price, $country, $drive, $steering);
        $this->specialFeature = $specialFeature;
    }
    public function showCar()
    {
        parent::showCar();
        echo
            "<b>Особенность:</b> $this->specialFeature<br>";
    }
}

$car1 = new Car('Renault', 'Sandero', '2014', 'Легковой автомобиль', '2,5m', '1200kg', '500000', 'Russia', 'front', 'left');
$car2 = new SpecialCar('КАМАЗ', '6540 8x4', '2018', 'Грузовой автомобиль', '8m', '12495kg', '5000000', 'Russia', 'rear', 'left' ,'Автобетоносмеситель');
$car1->showCar();
$car2->showCar();
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();//1
$a2->foo();//2
$a1->foo();//3
$a2->foo();//4
//Статические методы и свойства принадлежат классу, а не его экземплярам. Поэтому каждый раз при вызове выполняется ++x

class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B1 extends A1 {
}
$a1 = new A1();
$b1 = new B1();
$a1->foo();//1
$b1->foo();//1
$a1->foo();//2
$b1->foo();//2
//Аналогично предыдущему, но теперь есть и второй класс, и в нём свой static
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
//7. Аналогичный ответ предыдущему, как я понял PHP строго не требует скобки () при создании экземпляра класса