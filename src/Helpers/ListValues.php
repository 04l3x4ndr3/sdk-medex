<?php

namespace O4l3x4ndr3\SdkMedex\Helpers;
class ListValues
{
    public static function getPeriods(?int $key): array|string
    {
        $values = [
            "morning",
            "afternoon",
            "night"
        ];

        return isset($key) ? $values[$key] : $values;
    }

    public static function getSpecialities(?string $key): array|string
    {
        $values = [
            "Médico",
            "Médico - Alergia e Imunologia",
            "Médico - Cardiologista",
            "Médico - Cirurgia Vascular",
            "Médico - Clínico Geral",
            "Médico - Coloproctologista",
            "Médico - Dermatologista",
            "Médico - Endocrinologista",
            "Médico - Gastroenterologia",
            "Médico - Gastroenterologia Pediátrica",
            "Médico - Geriatra",
            "Médico - Ginecologista",
            "Médico - Infectologista",
            "Médico - Medicina de Família",
            "Médico - Nefrologista",
            "Médico - Neurologista",
            "Médico - Nutrólogo",
            "Médico - Oftalmologista",
            "Médico - Ortopedista",
            "Médico - Otorrino",
            "Médico - Pediatra",
            "Médico - Pneumologista",
            "Médico - Psiquiatra",
            "Médico - Psiquiatra Infantil",
            "Médico - Reumatologista",
            "Médico - Urologista",
            "Médico de Família",
            "Nutricionista",
            "Personal",
            "Psicólogo",
        ];

        return isset($key) ? $values[$key] : $values;
    }
}