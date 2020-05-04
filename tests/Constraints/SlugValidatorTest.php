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

    /**
     * @dataProvider wrongSlugProvider
     */
    public function testSlugIsNotValid($slug)
    {
        $this->validator->validate($slug, new Slug());

        $this->buildViolation('slug')
            ->setParameter('{{ value }}', $slug)
            ->setCode(Slug::SLUG_ERROR)
            ->assertRaised();
    }

    public function wrongSlugProvider()
    {
        return [
            ['le-titre de-mon-article))'],
            ['--article-de-press'],
            ['1--another-awesome-article-1234'],
            ['A)VERY(GOOD-ARTICLE'],
        ];
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
