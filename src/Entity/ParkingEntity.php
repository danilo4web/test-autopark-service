<?php

declare(strict_types=1);

namespace AutoPark\Entity;

class ParkingEntity
{
    private string $name;
    private int $limit = self::PARKING_LIMIT;
    private array $parkingSpaces = [];
    public const PARKING_LIMIT = 10;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ParkingEntity
     */
    public function setName(string $name): ParkingEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return ParkingEntity
     */
    public function setLimit(int $limit): ParkingEntity
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return array
     */
    public function getParkingSpaces(): array
    {
        return $this->parkingSpaces;
    }

    /**
     * @param array $parkingSpaces
     * @return ParkingEntity
     */
    public function setParkingSpaces(array $parkingSpaces): ParkingEntity
    {
        $this->parkingSpaces = $parkingSpaces;
        return $this;
    }
}
