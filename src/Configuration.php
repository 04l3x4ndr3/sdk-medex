<?php

namespace O4l3x4ndr3\SdkMedex;

class Configuration
{
    public const ENV_TMED = "tmed";
    public const ENV_AGENDA = "agenda";
    public const URL_TMED = "https://partner-telemedicina.medex.net.br";
    public const URL_AGENDA = "https://ppr-partnet.medexapi.com";
    private ?string $environment;
    private ?array $credentials;
    private ?array $httpHeader;

    public function __construct(?string $username = null, ?string $password = null)
    {
        $this->environment = $_SERVER['MEDEX_ENVIRONMENT'] ?? self::ENV_TMED;
        $this->credentials = [
            'username' => $_SERVER['MEDEX_API_USERNAME'] ?? $username,
            'password' => $_SERVER['MEDEX_API_PASSWORD'] ?? $password
        ];
        $this->httpHeader = [];
    }

    /**
     * @return array
     */
    public function getCredential(): array
    {
        return $this->credentials;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return void
     */
    public function setCredential(string $username, string $password): void
    {
        $credentials = array_merge($this->credentials, [
            'username' => $username,
            'password' => $password
        ]);
        $this->credentials = $credentials;
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     *
     * @return void
     */
    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    /**
     * @return array|null
     */
    public function getHttpHeader(): ?array
    {
        return $this->httpHeader;
    }

    /**
     * @param array $httpHeader
     */
    public function setHttpHeader(array $httpHeader): void
    {
        $this->httpHeader = $httpHeader;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if ($this->getEnvironment() === self::ENV_AGENDA) {
            return self::URL_AGENDA;
        }
        return self::URL_TMED;
    }
}
