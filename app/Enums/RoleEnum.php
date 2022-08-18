<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RoleEnum extends Enum
{
    public const SINHVIEN =   1;
    public const GIAOVIEN =    2;
    public const QUANLY =    3;
}
