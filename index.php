<?php
declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';



use App\Fruits\Fruit;

use App\Storage\Box;
use App\Fruits\Apple;
use App\Fruits\Banana;
use App\Fruits\Dates;

$box = Box::getInstance(3);
$box->add(new Apple('Medium', 'Red', 95));
$box->add(new Banana('Large', 'Yellow', 105));
$box->add(new Dates('Small', 'Brown', 20));

$fruitType = $box->getFruitAt(1)?->getType(); 
echo "A második gyümölcs típusa: " . $fruitType;

?>