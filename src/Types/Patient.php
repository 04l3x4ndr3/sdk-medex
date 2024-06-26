<?php

namespace O4l3x4ndr3\SdkMedex\Types;
class Patient {
    private ?string $id;
    private ?string $cpf;
    private ?string $name;
    private ?string $birthdate;
    private ?string $state;
    private ?string $city;
    private ?string $street;
    private ?int $number;
    private ?string $email;
    private ?string $phone;
    private ?string $company;
    private ?string $situation;
    private ?string $partner;
    private ?string $createdAt;

    /**
     * @param string|null $id
     * @param string|null $cpf
     * @param string|null $name
     * @param string|null $birthdate
     * @param string|null $state
     * @param string|null $city
     * @param string|null $street
     * @param int|null $number
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $company
     * @param string|null $situation
     * @param string|null $partner
     * @param string|null $createdAt
     */
    public function __construct(
        ?string $id = null,
        ?string $cpf = null,
        ?string $name = null,
        ?string $birthdate = null,
        ?string $state = null,
        ?string $city = null,
        ?string $street = null,
        ?int $number = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $company = null,
        ?string $situation = null,
        ?string $partner = null,
        ?string $createdAt = null
    ) {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->state = $state;
        $this->city = $city;
        $this->street = $street;
        $this->number = $number;
        $this->email = $email;
        $this->phone = $phone;
        $this->company = $company;
        $this->situation = $situation;
        $this->partner = $partner;
        $this->createdAt = $createdAt;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): TelemedicineUser
    {
        $this->id = $id;
        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): TelemedicineUser
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): TelemedicineUser
    {
        $this->name = $name;
        return $this;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function setBirthdate(?string $birthdate): TelemedicineUser
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): TelemedicineUser
    {
        $this->state = $state;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): TelemedicineUser
    {
        $this->city = $city;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): TelemedicineUser
    {
        $this->street = $street;
        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): TelemedicineUser
    {
        $this->number = $number;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): TelemedicineUser
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): TelemedicineUser
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): TelemedicineUser
    {
        $this->company = $company;
        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(?string $situation): TelemedicineUser
    {
        $this->situation = $situation;
        return $this;
    }

    public function getPartner(): ?string
    {
        return $this->partner;
    }

    public function setPartner(?string $partner): TelemedicineUser
    {
        $this->partner = $partner;
        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): TelemedicineUser
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            "id" => $this->id,
            "cpf" => $this->cpf,
            "name" => $this->name,
            "birthdate" => $this->birthdate,
            "state" => $this->state,
            "city" => $this->city,
            "street" => $this->street,
            "number" => $this->number,
            "email" => $this->email,
            "phone" => $this->phone,
            "company" => $this->company,
            "situation" => $this->situation,
            "partner" => $this->partner,
            "createdAt" => $this->createdAt,
        ], function ($value) {
            return isset($value);
        });
    }
}