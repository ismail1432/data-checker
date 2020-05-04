<?php

namespace Eniams\DataChecker\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Smaïne Milianni <contact@smaine.me>
 */
class SlugValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Slug) {
            throw new UnexpectedTypeException($constraint, Slug::class);
        }

        if (!\preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(Slug::SLUG_ERROR)
                ->addViolation();
        }
    }
}
