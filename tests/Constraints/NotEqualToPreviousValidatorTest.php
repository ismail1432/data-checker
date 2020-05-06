<?php

namespace Eniams\DataChecker\Tests;

use Eniams\DataChecker\Constraints\NotEqualToPrevious;
use Eniams\DataChecker\Constraints\NotEqualToPreviousValidator;
use Eniams\Spy\Spy;
use Eniams\Spy\SpyInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class NotEqualToPreviousValidatorTest extends ConstraintValidatorTestCase
{
    protected function setUp(): void
    {
        $this->group = 'MyGroup';
        $this->metadata = null;
        $this->object = $this->getFixture();
        $this->root = 'root';
        $this->propertyPath = 'property.path';

        // Initialize the context with some constraint so that we can
        // successfully build a violation.
        $this->constraint = new NotNull();

        $this->context = $this->createContext();
        $this->validator = $this->createValidator();
        $this->validator->initialize($this->context);

        \Locale::setDefault('en');

        $this->setDefaultTimezone('UTC');
    }

    protected function createValidator()
    {
        return new NotEqualToPreviousValidator();
    }

    public function testNotEqualToPreviousValid()
    {
        $object = $this->getFixture();

        $this->validator->validate($object, new NotEqualToPrevious(new Spy($object)));

        $this->assertNoViolation();
    }



    private function getFixture()
    {
        return new class() implements SpyInterface {

            /**
             * @NotEqualToPrevious()
             */
            public $title = 'original';

            public function getIdentifier(): string
            {
                return '511c29f1-21a3-49c9-9734-caa2335aeee9';
            }
        };
    }
}
