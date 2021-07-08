<?php

declare(strict_types=1);

namespace AutoPark\Controller;

use AutoPark\Entity\CarEntity;
use AutoPark\Service\ParkingServiceInterface;
use DomainException;

class ParkingController
{
    public function __construct(
        private ParkingServiceInterface $parkingService,
        private CarEntity $carEntity
    ) {
    }

    public function handle(array $licencePlates): array
    {
        $stream = fopen('storage/output.txt', 'a+');

        foreach ($licencePlates as $licencePlate) {
            try {
                $this->parkNewCar($licencePlate);
                fputs($stream, "$licencePlate parked with success!" . PHP_EOL);
            } catch (DomainException $exception) {
                fputs($stream, $exception->getMessage() . PHP_EOL);
            }
        }

        fputs($stream, "===============================" . PHP_EOL);
        return $this->parkingService->getParkingSpacesInUse();
    }

    public function parkNewCar(string $licencePlate): bool
    {
        $this->carEntity->setLicencePlate($licencePlate);
        $this->carEntity->setBrand("Car - " . $licencePlate);

        return $this->parkingService->parkCar($this->carEntity);
    }
}
