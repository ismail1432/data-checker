<?php

namespace Eniams\DataChecker\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NotEqualToPreviousValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof NotEqualToPrevious) {
            throw new UnexpectedTypeException($constraint, NotEqualToPrevious::class);
        }

        if ($spyed->isModfied()) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(NotEqualToPrevious::NOT_EQUAL_TO_PREVIOUS_ERROR)
                ->addViolation();
        }
    }
}
