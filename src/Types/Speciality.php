<?php

namespace O4l3x4ndr3\SdkMedex\Types;
class Speciality {
    private ?string $code;
    private ?string $description;
    private ?string $occupation;
    private ?string $id;

    /**
     * @param string|null $code
     * @param string|null $description
     * @param string|null $occupation
     * @param string|null $id
     */
    public function __construct(
        ?string $code,
        ?string $description,
        ?string $occupation,
        ?string $id
    ) {
        $this->code = $code;
        $this->description = $description;
        $this->occupation = $occupation;
        $this->id = $id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): Speciality
    {
        $this->code = $code;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Speciality
    {
        $this->description = $description;
        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): Speciality
    {
        $this->occupation = $occupation;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Speciality
    {
        $this->id = $id;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            "code" => $this->code,
            "description" => $this->description,
            "occupation" => $this->occupation,
            "id" => $this->id
        ], function ($value) {
            return !empty($value);
        });
    }
}