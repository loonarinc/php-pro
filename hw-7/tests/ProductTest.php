<?php


namespace app\tests;

use app\models\entities\Product;
use app\models\repositories\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testGetProducts(){
        $this->assertNotNull((new ProductRepository())->getAll());
    }
    public function testProduct() {
        $name = "Чай";
        $product = new Product($name, "Цейлонский", 55);
        $this->assertEquals($name, $product->name);
        /*
        if (strpos(Models::class, "app\\") === 0) {}
        if (array_slice("\\", get_class(new Models()),1,1) === ["models"]) {}

        */
    }

}