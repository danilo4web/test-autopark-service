<?php

namespace Tests\AutoPark\Unit\Service;

use AutoPark\Entity\CarEntity;
use PHPUnit\Framework\TestCase;
use AutoPark\Service\ParkingService;
use AutoPark\Service\ParkingServiceInterface;
use AutoPark\Entity\ParkingEntity;
use DomainException;

class ParkingServiceTest extends TestCase
{
    private ParkingEntity $parkingEntity;
    private ParkingServiceInterface $parkingService;

    public function setUp(): void
    {
        $this->parkingEntity = $this->getMockBuilder(ParkingEntity::class)->getMock();
        $this->parkingService = new ParkingService($this->parkingEntity);
    }

    public function testParkCarWithSuccessReturn()
    {
        $parkingSpacesInUse = ['AAA-1234' => 'Mitsubish', 'ZZZ-1234' => 'Ferrari'];
        $this->parkingEntity->method('getParkingSpaces')->willReturn($parkingSpacesInUse);
        $this->parkingEntity->method('getLimit')->willReturn(ParkingEntity::PARKING_LIMIT);

        $carEntity = $this->getMockBuilder(CarEntity::class)->getMock();
        $carEntity->method('getLicencePlate')->willReturn('BBB-8787');
        $carEntity->method('getBrand')->willReturn('Ford');

        $result = $this->parkingService->parkCar($carEntity);
        self::assertTrue($result);
    }

    /**
     * @dataProvider generateLicencePlatesProvider
     */
    public function testIfParkingSpacesIsNotAvailable(array $licencePlates)
    {
        self::expectException(DomainException::class);
        $this->parkingEntity->method('getParkingSpaces')->willReturn($licencePlates);

        $this->parkingEntity->method('getLimit')->willReturn(ParkingEntity::PARKING_LIMIT);

        $carEntity = $this->getMockBuilder(CarEntity::class)->getMock();
        $carEntity->method('getLicencePlate')->willReturn('BBB-8787');
        $carEntity->method('getBrand')->willReturn('Ford');

        $this->parkingService->parkCar($carEntity);
    }

    public function testGetParkingSpacesInUse(): void
    {
        $this->parkingEntity->method('getParkingSpaces')->willReturn(['AAA-1234' => 'Mitsubish']);
        $result = $this->parkingService->getParkingSpacesInUse();
        self::assertIsArray($result);
    }

    public function testSetLimit(): void
    {
        $this->parkingEntity->expects($this->exactly(1))->method('setLimit');
        $this->parkingService->setLimit(ParkingEntity::PARKING_LIMIT);
    }

    public function generateLicencePlatesProvider(): array
    {
        return [
            [
                [
                    "AAA-0000" => "Carro 1",
                    "AAA-0001" => "Carro 2",
                    "AAA-0002" => "Carro 3",
                    "AAA-0003" => "Carro 4",
                    "AAA-0004" => "Carro 5",
                    "AAA-0005" => "Carro 6",
                    "AAA-0006" => "Carro 7",
                    "AAA-0007" => "Carro 8",
                    "AAA-0008" => "Carro 9",
                    "AAA-0009" => "Carro 10"
                ]
            ]
        ];
    }
}
