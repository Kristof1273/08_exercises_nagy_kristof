<?php
declare(strict_types=1);

namespace App\Fruits;

abstract class Fruit
{
    public function __construct(
        protected readonly string $size,
        protected readonly string $colour,
        protected readonly int $calories
    ) {}

    public function getSize(): string { return $this->size; }
    public function getColour(): string { return $this->colour; }
    public function getCalorie(): int { return $this->calories; }
    
    public function getType(): string { return static::class; }
}

?>