<?php

declare(strict_types=1);

namespace AutoPark\Service;

use AutoPark\Entity\CarEntity;
use AutoPark\Entity\ParkingEntity;
use DomainException;

class ParkingService implements ParkingServiceInterface
{
    public function __construct(
        private ParkingEntity $parkingEntity
    ) {
    }

    public function parkCar(CarEntity $carEntity): bool
    {
        $parkingSpacesInUse = $this->parkingEntity->getParkingSpaces();
        $this->checkParkingSpacesAvailable($parkingSpacesInUse);

        $parkingSpacesInUse[$carEntity->getLicencePlate()] = $carEntity->getBrand();
        $this->parkingEntity->setParkingSpaces($parkingSpacesInUse);

        return true;
    }

    private function checkParkingSpacesAvailable(array $parkingSpacesInUse): void
    {
        if ($this->parkingEntity->getLimit() <= count($parkingSpacesInUse)) {
            throw new DomainException("Sorry, have no parking spaces available!");
        }
    }

    public function getParkingSpacesInUse(): array
    {
        return $this->parkingEntity->getParkingSpaces();
    }

    public function setLimit(int $limit): void
    {
        $this->parkingEntity->setLimit($limit);
    }
}
