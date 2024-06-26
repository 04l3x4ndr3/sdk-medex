<?php

namespace O4l3x4ndr3\SdkMedex\Contexts;
use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkMedex\Helpers\CallApi;
use O4l3x4ndr3\SdkMedex\Types\Appointment;
use O4l3x4ndr3\SdkMedex\Types\Patient;

class Telemedicine extends CallApi
{
    /**
     * @description Retorna o tempo médio de espera e o tamanho da fila
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/statusDaFila
     * @return object
     * @throws GuzzleException
     */
    public function queuePartnerStatus(): object
    {
        return $this->call("GET", "/v1/queue/partner/status");
    }

    /**
     * @description Busca os dados do usuário (paciente)
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/buscaDeDadosPorUmCpf
     * @param Patient $patient
     * @return object
     * @throws GuzzleException
     */
    public function meetsPartner(Patient $patient): object
    {
        return $this->call("GET", "/v1/meets/partner/" . $patient->getCpf());
    }

    /**
     * @description Entrar na fila de atendimento
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/entrarNaFila
     * @param Patient $patient
     * @return object
     * @throws GuzzleException
     */
    public function queuePartnerWait(Patient $patient): object
    {
        return $this->call("POST", "/v1/queue/partner/wait", $patient->toArray());
    }

    /**
     * @description Cadatra/Edita os dados do usuário (paciente)
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/cadastroEditarUsuario
     * @param Patient $patient
     * @return object
     * @throws GuzzleException
     */
    public function user(Patient $patient): object
    {
        return $this->call("POST", "/v1/user", $patient->toArray());
    }

    /**
     * @description Envia arquivos para a consulta
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/enviarDocs
     * @param array|null $data
     * @param string|null $meet
     * @return object
     * @throws GuzzleException
     */
    public function prescriptionFileMeet(?array $data, ?string $meet): object
    {
        return $this->call("POST", "/v1/prescription/file/$meet", $data);
    }

    /**
     * @description Busca na fila se há CPF informado
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/buscaNaFilaPorUmCpf
     * @param Patient $patient
     * @return object
     * @throws GuzzleException
     */
    public function partnerQueue(Patient $patient): object
    {
        return $this->call("GET", "v1/partner/queue?cpf={$patient->getCpf()}");
    }

    /**
     * @description Busca horários disponíveis num período do dia
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/buscaDeHorariosPorPeriodo
     * @param string|null $period
     * @param string|null $occupation
     * @return object
     * @throws GuzzleException
     */
    public function calendar(?string $period = null, ?string $occupation = null): object
    {
        $urlParams = array_filter([
           "period" => $period,
           "occupation" => $occupation
        ], function ($value) {
            return !empty($value);
        });

        $url = http_build_query($urlParams);

        return $this->call("GET", "v1/calendar?$url");
    }

    /**
     * @description Agenda uma consulta
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/
     * @param Appointment $appointment
     * @return object
     * @throws GuzzleException
     */
    public function makeAnAppointment(Appointment $appointment): object
    {
        return $this->call("POST", "v1/calendar", $appointment->toArray());
    }

    /**
     * @description Regenda uma consulta
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/reagendarHorario
     * @param Appointment $appointment
     * @return object
     * @throws GuzzleException
     */
    public function remakeAnAppointment(Appointment $appointment): object
    {
        return $this->call("PUT", "v1/calendar", $appointment->toArray());
    }

    /**
     * @description Regenda uma consulta
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/reagendarHorario
     * @param string|null $cpf
     * @param string|null $scheduleId
     * @return object
     * @throws GuzzleException
     */
    public function cancelAnAppointment(?string $cpf = null, ?string $scheduleId = null): object
    {
        return $this->call("DELETE", "/v1/calendar/$cpf/$scheduleId");
    }

    /**
     * @description Regenda uma consulta
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/reagendarHorario
     * @param string|null $cpf
     * @return object
     * @throws GuzzleException
     */
    public function schedule(?string $cpf = null): object
    {
        return $this->call("GET", "/v1/schedule/$cpf");
    }

    /**
     * @description Obtém informações e verificação do paciente (usuário)
     * @document https://app.swaggerhub.com/apis/medex/medex-tmed_partner/1.0.0#/default/buscaDeUsuarioPorCpf
     * @param string|null $cpf
     * @return object
     * @throws GuzzleException
     */
    public function authUser(?string $cpf = null): object
    {
        return $this->call("GET", "/v1/auth/user/$cpf");
    }


    /**
     * @description Obtém uma lista de doutores (test-only)
     * @document test-only
     * @param string|null $speciality
     * @param int|null $limit
     * @return object
     * @throws GuzzleException
     */
    public function doctors(
        ?string $speciality = null,
        ?int $limit = 1000
    ): object {
        return $this->call("GET", "/v1/doctors/$speciality?limit=$limit");
    }
}