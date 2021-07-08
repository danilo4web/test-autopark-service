<?php

require "./vendor/autoload.php";

/** @var  \Psr\Container\ContainerInterface $container */
$container = require_once __DIR__ . "/config/container.php";

$licencePlates = [];
if (isset($argv[1])) {
    $argumentAmount = (count($argv) - 1);
    for ($i = 1; $i <= $argumentAmount; $i++) {
        $licencePlates[] = $argv[$i];
    }

    /** @var \AutoPark\Controller\ParkingController $parkingController */
    $parkingController = $container->get(\AutoPark\Controller\ParkingController::class);
    $parkingController->handle($licencePlates);
}
