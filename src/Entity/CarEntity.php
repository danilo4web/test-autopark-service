<?php

declare(strict_types=1);

namespace AutoPark\Entity;

class CarEntity
{
    private string $brand;

    private string $licencePlate;

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return CarEntity
     */
    public function setBrand(string $brand): CarEntity
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getLicencePlate(): string
    {
        return $this->licencePlate;
    }

    /**
     * @param string $licencePlate
     * @return CarEntity
     */
    public function setLicencePlate(string $licencePlate): CarEntity
    {
        $this->licencePlate = $licencePlate;
        return $this;
    }
}
