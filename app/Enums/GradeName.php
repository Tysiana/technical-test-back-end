<?php

namespace App\Enums;

enum GradeName: int
{
    case Perfect = 1;
    case Good = 2;
    case Fair = 3;
    case Poor = 4;
    case BrokenMissing = 5;

    public function label(): string
    {
        return match($this) {
            self::Perfect => 'Perfect',
            self::Good => 'Good',
            self::Fair => 'Fair',
            self::Poor => 'Poor',
            self::BrokenMissing => 'Broken/Missing',
        };
    }
}
