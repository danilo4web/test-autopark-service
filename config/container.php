<?php

use DI\ContainerBuilder;

use AutoPark\Service\ParkingServiceInterface;
use AutoPark\Service\ParkingService;
use AutoPark\Entity\ParkingEntity;
use AutoPark\Entity\CarEntity;
use AutoPark\Controller\ParkingController;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    ParkingServiceInterface::class => \DI\create(ParkingService::class)->constructor(\DI\get(ParkingEntity::class)),
    ParkingController::class => \DI\create(ParkingController::class)->constructor(
        \DI\get(ParkingServiceInterface::class),
        \DI\get(CarEntity::class)
    ),
]);

return $containerBuilder->build();
