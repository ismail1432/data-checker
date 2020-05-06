<?php

namespace Eniams\DataChecker\Constraints;

use Eniams\Spy\Spy;
use Symfony\Component\Validator\Constraint;

/**
 * @author Smaïne Milianni <contact@smaine.me>
 */
class NotEqualToPrevious extends Constraint
{
    private $spy;

    const NOT_EQUAL_TO_PREVIOUS_ERROR = '511c29f1-21a3-49c9-9734-caa2335aeee4';

    protected static $errorNames = [
        self::NOT_EQUAL_TO_PREVIOUS_ERROR => 'NOT_EQUAL_TO_PREVIOUS_ERROR',
    ];

    public $message = 'This value should not be equal to the previous value.';

    public function __construct(Spy $spy, $options = null)
    {
        parent::__construct($options);

        $this->spy = $spy;
    }

    public function getSpy(): Spy
    {
        return $this->spy;
    }
}
