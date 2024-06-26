<?php

namespace O4l3x4ndr3\SdkMedex\Types;
class Places {
    private ?int $ug_cod;
    private ?string $ug_sigla;
    private ?string $ug_descr;
    private ?int $ug_rm;
    private ?string $id;

    /**
     * @param int|null $ug_cod
     * @param string|null $ug_sigla
     * @param string|null $ug_descr
     * @param int|null $ug_rm
     * @param string|null $id
     */
    public function __construct(
        ?int $ug_cod = null,
        ?string $ug_sigla = null,
        ?string $ug_descr = null,
        ?int $ug_rm = null,
        ?string $id = null
    ) {
        $this->ug_cod = $ug_cod;
        $this->ug_sigla = $ug_sigla;
        $this->ug_descr = $ug_descr;
        $this->ug_rm = $ug_rm;
        $this->id = $id;
    }

    public function getUgCod(): ?int
    {
        return $this->ug_cod;
    }

    public function setUgCod(?int $ug_cod): Places
    {
        $this->ug_cod = $ug_cod;
        return $this;
    }

    public function getUgSigla(): ?string
    {
        return $this->ug_sigla;
    }

    public function setUgSigla(?string $ug_sigla): Places
    {
        $this->ug_sigla = $ug_sigla;
        return $this;
    }

    public function getUgDescr(): ?string
    {
        return $this->ug_descr;
    }

    public function setUgDescr(?string $ug_descr): Places
    {
        $this->ug_descr = $ug_descr;
        return $this;
    }

    public function getUgRm(): ?int
    {
        return $this->ug_rm;
    }

    public function setUgRm(?int $ug_rm): Places
    {
        $this->ug_rm = $ug_rm;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Places
    {
        $this->id = $id;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            "ug_cod" => $this->ug_cod,
            "ug_sigla" => $this->ug_sigla,
            "ug_descr" => $this->ug_descr,
            "ug_rm" => $this->ug_rm,
            "id" => $this->id
        ], function ($value) {
            return !empty($value);
        });
    }
}