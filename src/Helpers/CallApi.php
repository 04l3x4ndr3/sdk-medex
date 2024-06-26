<?php

namespace O4l3x4ndr3\SdkMedex\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkMedex\Configuration;

class CallApi
{
    const CONTENT_TYPE_JSON = 'application/json';
    const TOKEN_TYPE = 'Basic';
    const PARTNER_HASH = "777111452";
    private Configuration $config;
    private ?array $header;
    private ?array $credential;

    public function __construct(?Configuration $config = NULL)
    {
        $this->config = $config ?? new Configuration();
        $this->credential = $this->config->getCredential();
        $this->header = array_merge([
            'Content-Type' => self::CONTENT_TYPE_JSON,
            'x-partner-hash' => self::PARTNER_HASH
        ], $this->config->getHttpHeader());
    }

    public function getHeader(): ?array
    {
        return $this->header;
    }

    public function setHeader(?array $header): CallApi
    {
        $this->header = $header;
        return $this;
    }

    public function getCredential(): ?array
    {
        return $this->credential;
    }

    public function setCredential(?array $credential): CallApi
    {
        $this->credential = $credential;
        return $this;
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array|null $body
     * @return array|object
     * @throws GuzzleException
     */
    public function call(string $method, string $endpoint, ?array $body = NULL): array|object
    {
        try {
            $this->credential = (new Configuration())->getCredential();
            $token = base64_encode($this->credential["username"] . ":" . $this->credential["password"]);
            $client = new Client();
            $options = array_filter([
                'headers' => [
                    'Content-type' => self::CONTENT_TYPE_JSON,
                    'Authorization' => self::TOKEN_TYPE . " $token"
                ],
                'json' => $body
            ]);

            $res = $client->request($method, "{$this->config->getUrl()}{$endpoint}", $options);
            return json_decode($res->getBody());
        } catch (ClientException $e) {
            throw new ClientException($e->getResponse()->getBody()->getContents(), $e->getCode(), $e);
        }
    }
}