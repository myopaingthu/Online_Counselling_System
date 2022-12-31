<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static getLabel()
 */
final class AppointmentMethod extends Enum
{
    const Offline =   0;
    const Online =   1;

    /**
     * @param int
     * @return string
     */
    public static function getLabel($key)
    {
        switch ($key) {
            case self::Offline:
                return "Offline";
            case self::Online:
                return "Online";
            default:
                return "";
        }
    }
}
