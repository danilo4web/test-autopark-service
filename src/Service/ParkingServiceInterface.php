<?php

declare(strict_types=1);

namespace AutoPark\Service;

use AutoPark\Entity\CarEntity;

interface ParkingServiceInterface
{
    public function parkCar(CarEntity $carEntity): bool;
    public function getParkingSpacesInUse(): array;
    public function setLimit(int $limit): void;
}
