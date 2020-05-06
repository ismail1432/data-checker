<?php

namespace Eniams\DataChecker\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Smaïne Milianni <contact@smaine.me>
 */
class NotEqualToPrevious extends Constraint
{
    const NOT_EQUAL_TO_PREVIOUS_ERROR = '3f5187d3-3526-404a-83e8-354430119b6a';

    protected static $errorNames = [
        self::NOT_EQUAL_TO_PREVIOUS_ERROR => 'NOT_EQUAL_TO_PREVIOUS_ERROR',
    ];

    public $message = 'This value should not be equal to the previous value.';
}
