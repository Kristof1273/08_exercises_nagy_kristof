<?php
declare(strict_types=1);

namespace App\Exercise08\Fruits;

class Banana extends Fruit implements PeelableInterface
{
    private bool $peeled = false;

    public function peel(): void { $this->peeled = true; }
    public function isPeeled(): bool { return $this->peeled; }
}
