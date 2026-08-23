<?php
declare(strict_types=1);

namespace App\Storage;

use App\Fruits\Fruit;

interface BoxInterface
{
    public function add(Fruit $fruit): void;
    public function empty(): void;

    /** @return array<Fruit> */
    public function getFruits(): array;
    public function getCount(): int;
    public function getTotalCalories(): int;
    
    /** @return array<Fruit> */
    public function getFruitByColour(string $colour): array;
    public function getFruitAt(int $index): ?Fruit;
}

?>