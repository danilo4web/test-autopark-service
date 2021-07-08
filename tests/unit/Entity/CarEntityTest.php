<?php

namespace Tests\AutoPark\Unit\Entity;

use AutoPark\Entity\CarEntity;
use PHPUnit\Framework\TestCase;

class CarEntityTest extends TestCase
{
    private CarEntity $carEntity;

    public function setUp(): void
    {
        $this->carEntity = new CarEntity();
    }

    public function testGetterAndSetBrand()
    {
        $data = 'Ferrari';
        $result = $this->carEntity->setBrand($data);

        self::assertSame($data, $this->carEntity->getBrand());
        self::assertInstanceOf(CarEntity::class, $result);
    }

    public function testGetterAndSetLicencePlate()
    {
        $data = 'AAA-8888';
        $result = $this->carEntity->setLicencePlate($data);

        self::assertSame($data, $this->carEntity->getLicencePlate());
        self::assertInstanceOf(CarEntity::class, $result);
    }
}
