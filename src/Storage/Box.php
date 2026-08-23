<?php
declare(strict_types=1);

namespace App\Storage;

use App\Fruits\Fruit;


class Box implements BoxInterface
{
    private static ?Box $instance = null;

    /** @var array<Fruit> */
    protected array $fruits = [];
    protected int $maxCapacity;

    private function __construct(int $maxCapacity = 10) 
    {
        $this->maxCapacity = $maxCapacity;
    }

    public static function getInstance(int $maxCapacity = 10): Box
    {
        if (self::$instance === null) {
            self::$instance = new static($maxCapacity);
        }
        return self::$instance;
    }

    public function add(Fruit $fruit): void
    {
        if ($this->getCount() >= $this->maxCapacity) {
            throw new \OverflowException("The box is full! Cannot add more fruits.");
        }
        $this->fruits[] = $fruit;
    }

    public function empty(): void { $this->fruits = []; }
    
    public function getFruits(): array { return $this->fruits; }
    
    public function getCount(): int { return count($this->fruits); }

    public function getTotalCalories(): int
    {
        return array_reduce($this->fruits, fn(int $carry, Fruit $fruit) => $carry + $fruit->getCalorie(), 0);
    }

    public function getFruitByColour(string $colour): array
    {
        return array_filter($this->fruits, fn(Fruit $fruit) => strtolower($fruit->getColour()) === strtolower($colour));
    }

    public function getFruitAt(int $index): ?Fruit
    {
        return $this->fruits[$index] ?? null;
    }
    
    private function __clone() {}
    public function __wakeup() { throw new \Exception("Unserialization prohibited!"); }
}

?>