<?php
declare(strict_types=1);

namespace App\Fruits;

interface PeelableInterface {
    public function peel(): void;
    public function isPeeled(): bool;
}

?>