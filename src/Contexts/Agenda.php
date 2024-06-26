<?php

namespace O4l3x4ndr3\SdkMedex\Contexts;
use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkMedex\Configuration;
use O4l3x4ndr3\SdkMedex\Helpers\CallApi;

class Agenda extends CallApi
{
    public function __construct(?Configuration $config = NULL)
    {
        $config->setEnvironment($config::ENV_AGENDA);
        parent::__construct($config);
    }

    /**
     * @description Fazer uma reserva
     * @description Provavelmente depreciado
     * @document https://app.swaggerhub.com/apis/medex/medex-agenda-partner/1#/Agendamento/reservarAgenda
     * @param string|null $partner
     * @param string|null $partner_code
     * @param string|null $requester
     * @return object
     * @throws GuzzleException
     */
    public function makeAnAppointment(
        ?string $partner = "Medex",
        ?string $partner_code = "medex",
        ?string $requester = "TokSaúde"
    ): object {
        $data = [
            "partner" => $partner,
            "partner_code" => $partner_code,
            "requester" => $requester
        ];
        return $this->call("PUT", "/calendar/slot/_id_", $data);
    }

    /**
     * @description Cancelar uma reserva
     * @description Provavelmente depreciado
     * @document https://app.swaggerhub.com/apis/medex/medex-agenda-partner/1#/
     * @return object
     * @throws GuzzleException
     */
    public function cancelAnAppointment(): object {
        return $this->call("DELETE", "/calendar/slot/_id_");
    }

    /**
     * @description Listar datas disponíveis
     * @document https://app.swaggerhub.com/apis/medex/medex-agenda-partner/1#/Agendamento/listarDatasDisponVeis
     * @param string|null $occupation
     * @param int|null $limit
     * @return object
     * @throws GuzzleException
     */
    public function calendarDates(?string $occupation = null, ?int $limit = 1000): object {
        $urlParams = array_filter([
            "occupation" => $occupation,
            "limit" => $limit
        ], function ($value) {
            return !empty($value);
        });

        $url = http_build_query($urlParams);

        return $this->call("GET", "/calendar/dates?$url");
    }

    /**
     * @description Listar reservas para as datas
     * @description Provavelmente depreciado
     * @document https://app.swaggerhub.com/apis/medex/medex-agenda-partner/1#/Agendamento/listarAgendasParaData
     * @param string|null $occupation
     * @param int|null $limit
     * @return object
     * @throws GuzzleException
     */
    public function calendarSlots(?string $occupation = null, ?int $limit = 1000): object {
        $urlParams = array_filter([
            "occupation" => $occupation,
            "limit" => $limit
        ], function ($value) {
            return !empty($value);
        });

        $url = http_build_query($urlParams);

        return $this->call("GET", "/calendar/dates?$url");
    }

    /**
     * @description Listar reservas
     * @description Provavelmente depreciado
     * @document https://app.swaggerhub.com/apis/medex/medex-agenda-partner/1#/Agendamento/listarAgendados
     * @return object
     * @throws GuzzleException
     */
    public function calendarSchedule(): object {
        return $this->call("GET", "/calendar/schedule");
    }
}