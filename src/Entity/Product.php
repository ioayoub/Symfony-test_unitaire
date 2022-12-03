<?php
namespace App\Entity;
class Product
{
    const FOOD_PRODUCT = 'food';
    private String $name;
    private String $type;
    private float $price;
    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }
    public function computeTVA() : float | \Exception
    {
        if ($this->price < 0) {
            return new \Exception('The TVA cannot be negative.');
        }

        if (self::FOOD_PRODUCT == $this->type) {
            return $this->price * 0.055;
        }
        return $this->price * 0.196;
    }
}