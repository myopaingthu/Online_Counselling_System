<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static getLabe()
 */
final class CounsellorGender extends Enum
{
    const Female =   0;
    const Male =   1;

    /**
     * @param int
     * @return string
     */
    public static function getLabel($key)
    {
        switch ($key) {
            case self::Female:
                return "Female";
            case self::Male:
                return "Male";
            default:
                return "";
        }
    }
}
