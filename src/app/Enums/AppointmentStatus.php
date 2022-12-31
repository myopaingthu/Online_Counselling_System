<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 */
final class AppointmentStatus extends Enum
{
    const Pending =   0;
    const Accept =   1;
    const Decline = 2;

    /**
     * @param int
     * @return string
     */
    public static function getLabel($key)
    {
        switch ($key) {
            case self::Pending:
                return "Pending";
            case self::Accept:
                return "Accept";
            case self::Decline:
                return "Decline";
            default:
                return "";
        }
    }
}
