<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ClassTypeEnum extends Enum
{
    public const LT =   1;
    public const TH =   2;
    public const LT_TH = 3;
}
