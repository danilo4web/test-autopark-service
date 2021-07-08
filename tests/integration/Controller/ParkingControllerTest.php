<?php

namespace Tests\AutoPark\Integration\Controller;

use AutoPark\Controller\ParkingController;
use AutoPark\Entity\CarEntity;
use AutoPark\Entity\ParkingEntity;
use AutoPark\Service\ParkingService;
use PHPUnit\Framework\TestCase;

class ParkingControllerTest extends TestCase
{
    private ParkingController $parkingController;

    public function setUp(): void
    {
        $parkingEntity = new ParkingEntity();
        $parkingService = new ParkingService($parkingEntity);
        $carEntity = new CarEntity();
        $this->parkingController = new ParkingController($parkingService, $carEntity);
    }

    /**
     * @dataProvider generateLicencePlatesProvider
     */
    public function testParkMoreThanTenCars(array $licencePlates): void
    {
        $licencePlatesInserted = $this->parkingController->handle($licencePlates);

        self::assertIsArray($licencePlatesInserted);
        self::assertCount(10, $licencePlatesInserted);
    }

    public function generateLicencePlatesProvider(): array
    {
        return [
            [
                [
                    'AAA-0000',
                    'AAA-0001',
                    'AAA-0002',
                    'AAA-0003',
                    'AAA-0004',
                    'AAA-0005',
                    'AAA-0006',
                    'AAA-0007',
                    'AAA-0008',
                    'AAA-0009'
                ],
            ],
            [
                [
                    'AAA-0000',
                    'AAA-0001',
                    'AAA-0002',
                    'AAA-0003',
                    'AAA-0004',
                    'AAA-0005',
                    'AAA-0006',
                    'AAA-0007',
                    'AAA-0008',
                    'AAA-0009',
                    'AAA-0010'
                ]

            ]
        ];
    }
}
