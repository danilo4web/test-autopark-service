<?php

namespace Tests\AutoPark\Unit\Entity;

use AutoPark\Entity\ParkingEntity;
use PHPUnit\Framework\TestCase;

class ParkingEntityTest extends TestCase
{
    private ParkingEntity $parkingEntity;

    public function setUp(): void
    {
        $this->parkingEntity = new ParkingEntity();
    }

    public function testGetterAndSetBrand()
    {
        $data = 'AutoPark';
        $result = $this->parkingEntity->setName($data);

        self::assertSame($data, $this->parkingEntity->getName());
        self::assertInstanceOf(ParkingEntity::class, $result);
    }

    public function testGetterAndSetLimit()
    {
        $data = 10;
        $result = $this->parkingEntity->setLimit($data);

        self::assertSame($data, $this->parkingEntity->getLimit());
        self::assertInstanceOf(ParkingEntity::class, $result);
    }

    public function testGetterAndSetParkingSpaces()
    {
        $data = [
            'AAA-0001' => 'Car 1',
            'AAA-0002' => 'Car 2',
            'AAA-0003' => 'Car 3',
            'AAA-0004' => 'Car 4',
            'AAA-0005' => 'Car 5'
        ];

        $result = $this->parkingEntity->setParkingSpaces($data);

        self::assertSame($data, $this->parkingEntity->getParkingSpaces());
        self::assertInstanceOf(ParkingEntity::class, $result);
        self::assertIsArray($this->parkingEntity->getParkingSpaces());
    }
}
