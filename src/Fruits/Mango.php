<?php
declare(strict_types=1);

namespace App\Fruits;

class Mango extends Fruit implements ExoticFruitInterface, PeelableInterface
{
    private bool $peeled = false;

    public function peel(): void { $this->peeled = true; }
    public function isPeeled(): bool { return $this->peeled; }
}

?>