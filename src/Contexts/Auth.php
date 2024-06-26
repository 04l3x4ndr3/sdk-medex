<?php

namespace O4l3x4ndr3\SdkMedex\Contexts;
use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkMedex\Configuration;
use O4l3x4ndr3\SdkMedex\Helpers\CallApi;
use O4l3x4ndr3\SdkMedex\Types\Appointment;
use O4l3x4ndr3\SdkMedex\Types\Patient;

class Auth extends CallApi
{
    public function __construct(?Configuration $config = null)
    {
        $config->setEnvironment("auth");
        parent::__construct($config);
    }

    /**
     * @description
     * @document
     * @return object
     * @throws GuzzleException
     */
    public function auth(): object
    {
        return $this->call("POST", "", [
            "client_id" => $this->getCredential()["username"],
            "client_secret" => $this->getCredential()["password"]
        ]);
    }
}