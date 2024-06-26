<?php

namespace O4l3x4ndr3\SdkMedex\Types;
class Appointment {
    private ?string $cpf;
    private ?array $slots;
    private ?string $slotAt;
    private ?string $company;
    private ?Authorization $autorization;

    /**
     * @param string|null $cpf
     * @param array|null $slots
     * @param string|null $slotAt
     * @param string|null $company
     * @param Authorization|null $autorization
     */
    public function __construct(
        ?string $cpf = null,
        ?array $slots = [],
        ?string $slotAt = null,
        ?string $company = null,
        ?Authorization $autorization = null
    ) {
        $this->cpf = $cpf;
        $this->slots = $slots;
        $this->slotAt = $slotAt;
        $this->company = $company;
        $this->autorization = $autorization;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): Appointment
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getSlots(): ?array
    {
        return $this->slots;
    }

    public function setSlots(?array $slots): Appointment
    {
        $this->slots = $slots;
        return $this;
    }

    public function addSlot(?string $slot): Appointment
    {
        if (!isset($this->slots)) {
            $this->slots = [];
        }

        $this->slots[] = $slot;
        return $this;
    }

    public function clearSlots(): Appointment
    {
        $this->slots = [];
        return $this;
    }

    public function getSlotAt(): ?string
    {
        return $this->slotAt;
    }

    public function setSlotAt(?string $slotAt): Appointment
    {
        $this->slotAt = $slotAt;
        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): Appointment
    {
        $this->company = $company;
        return $this;
    }

    public function getAutorization(): ?Authorization
    {
        return $this->autorization;
    }

    public function setAutorization(?Authorization $autorization): Appointment
    {
        $this->autorization = $autorization;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            "cpf" => $this->cpf,
            "slots" => $this->slots,
            "company" => $this->company,
            "autorization" => $this->autorization->toArray()
        ], function ($value) {
            return isset($value);
        });
    }
}