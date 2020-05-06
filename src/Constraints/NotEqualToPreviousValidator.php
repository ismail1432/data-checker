<?php

namespace Eniams\DataChecker\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NotEqualToPreviousValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof NotEqualToPrevious) {
            throw new UnexpectedTypeException($constraint, NotEqualToPrevious::class);
        }

        $property = $this->context->getPropertyName();

        dd($this->context);
        if ($constraint->getSpy()->isPropertyModified($property)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(NotEqualToPrevious::NOT_EQUAL_TO_PREVIOUS_ERROR)
                ->addViolation();
        }
    }
}
