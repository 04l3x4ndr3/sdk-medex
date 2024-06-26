<?php

namespace O4l3x4ndr3\SdkMedex\Types;
class Authorization {
    private ?string $token;
    private ?string $codom;
    private ?string $enc_id;
    private ?array $cod_procedimento;
    private ?string $data_emissao_guia;
    private ?string $descricao_procedimento;
    private ?string $phone;
    private ?string $validade;
    private ?Places $places;
    private ?array $speciality;

    /**
     * @param string|null $token
     * @param string|null $codom
     * @param string|null $enc_id
     * @param array|null $cod_procedimento
     * @param string|null $data_emissao_guia
     * @param string|null $descricao_procedimento
     * @param string|null $phone
     * @param string|null $validade
     * @param Places|null $places
     * @param array|null $speciality
     */
    public function __construct(
        ?string $token = null,
        ?string $codom = null,
        ?string $enc_id = null,
        ?array $cod_procedimento = [],
        ?string $data_emissao_guia = null,
        ?string $descricao_procedimento = null,
        ?string $phone = null,
        ?string $validade = null,
        ?Places $places = null,
        ?array $speciality = null
    ) {
        $this->token = $token;
        $this->codom = $codom;
        $this->enc_id = $enc_id;
        $this->cod_procedimento = $cod_procedimento;
        $this->data_emissao_guia = $data_emissao_guia;
        $this->descricao_procedimento = $descricao_procedimento;
        $this->phone = $phone;
        $this->validade = $validade;
        $this->places = $places;
        $this->speciality = $speciality;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): Authorization
    {
        $this->token = $token;
        return $this;
    }

    public function getCodom(): ?string
    {
        return $this->codom;
    }

    public function setCodom(?string $codom): Authorization
    {
        $this->codom = $codom;
        return $this;
    }

    public function getEncId(): ?string
    {
        return $this->enc_id;
    }

    public function setEncId(?string $enc_id): Authorization
    {
        $this->enc_id = $enc_id;
        return $this;
    }

    public function getCodProcedimento(): ?array
    {
        return $this->cod_procedimento;
    }

    public function setCodProcedimento(?array $cod_procedimento): Authorization
    {
        $this->cod_procedimento = $cod_procedimento;
        return $this;
    }

    public function addCodProcedimento(?string $procedimento): Authorization
    {
        if (!isset($this->cod_procedimento)) {
            $this->cod_procedimento = [];
        }
        $this->cod_procedimento[] = $procedimento;

        return $this;
    }

    public function clearCodProcedimento(): Authorization
    {
        $this->cod_procedimento = [];

        return $this;
    }

    public function getDataEmissaoGuia(): ?string
    {
        return $this->data_emissao_guia;
    }

    public function setDataEmissaoGuia(?string $data_emissao_guia): Authorization
    {
        $this->data_emissao_guia = $data_emissao_guia;
        return $this;
    }

    public function getDescricaoProcedimento(): ?string
    {
        return $this->descricao_procedimento;
    }

    public function setDescricaoProcedimento(?string $descricao_procedimento): Authorization
    {
        $this->descricao_procedimento = $descricao_procedimento;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): Authorization
    {
        $this->phone = $phone;
        return $this;
    }

    public function getValidade(): ?string
    {
        return $this->validade;
    }

    public function setValidade(?string $validade): Authorization
    {
        $this->validade = $validade;
        return $this;
    }

    public function getPlaces(): ?Places
    {
        return $this->places;
    }

    public function setPlaces(?Places $places): Authorization
    {
        $this->places = $places;
        return $this;
    }

    public function getSpeciality(): ?array
    {
        return $this->speciality;
    }

    public function setSpeciality(?array $speciality): Authorization
    {
        $this->speciality = $speciality;
        return $this;
    }

    public function addSpeciality(Speciality $speciality): Authorization
    {
        if (!isset($this->speciality)) {
            $this->speciality = [];
        }

        $this->speciality[] = $speciality->toArray();
        return $this;
    }

    public function clearSpeciality(): Authorization
    {
        $this->speciality = [];

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            "token" => $this->token,
            "codom" => $this->codom,
            "enc_id" => $this->enc_id,
            "cod_procedimento" => $this->cod_procedimento,
            "data_emissao_guia" => $this->data_emissao_guia,
            "descricao_procedimento" => $this->descricao_procedimento,
            "phone" => $this->phone,
            "validade" => $this->validade,
            "places" => $this->places->toArray(),
            "speciality" => $this->speciality
        ], function ($value) {
            return isset($value);
        });
    }
}