<?php
declare(strict_types=1);

namespace App\Storage;

use App\Fruits\Fruit;
use App\Fruits\ExoticFruitInterface;

class ExoticBox extends Box
{
    public function add(Fruit $fruit): void
    {
        if (!$fruit instanceof ExoticFruitInterface) {
            throw new \InvalidArgumentException("This box only accepts exotic fruits (implements ExoticFruitInterface).");
        }
        
        parent::add($fruit);
    }
}

?>