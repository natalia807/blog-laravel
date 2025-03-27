<?php

require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create('pt_BR');

echo $faker->sentence() . "\n";
echo $faker->paragraph() . "\n";