<?php

namespace Eniams\DataChecker\Tests;

use Eniams\DataChecker\Constraints\Slug;
use Eniams\DataChecker\Constraints\SlugValidator;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

final class SlugValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator()
    {
        return new SlugValidator();
    }

    /**
     * @dataProvider goodSlugProvider
     */
    public function testSlugIsValid($slug)
    {
        $this->validator->validate($slug, new Slug());

        $this->assertNoViolation();
    }

    public function wrongSlugProvider()
    {
    }

    public function goodSlugProvider(): array
    {
        return [
            ['le-titre-de-mon-article'],
            ['article-de-press'],
            ['another-awesome-article-1234'],
            ['A-VERY-GOOD-ARTICLE'],
        ];
    }
}
