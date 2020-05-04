<?php

namespace Eniams\DataChecker\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Smaïne Milianni <contact@smaine.me>
 */
class Slug extends Constraint
{
    const SLUG_ERROR = '3f5187d3-3526-404a-83e8-354430119b6a';

    protected static $errorNames = [
        self::SLUG_ERROR => 'SLUG_ERROR',
    ];

    public $message = 'This value is not a valid slug.';
}
