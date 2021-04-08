<?php
namespace blog\helpers;

use DateTime;
use InvalidArgumentException;

class DateFormat
{

    public static function brazil_date($date) :string
    {
        if ($date == null || !is_string($date)){
            throw new InvalidArgumentException("Erro na passagem de parâmetro, era esperado uma string!");
        }
        return DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }
}