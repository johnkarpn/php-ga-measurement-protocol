<?php

namespace TheIconic\Tracking\GoogleAnalytics\Parameters;

use PHPUnit\Framework\TestCase;
use TheIconic\Tracking\GoogleAnalytics\Tests\CompoundTestParameter;

class CompoundParameterTest extends TestCase
{
    /**
     * @var CompoundParameter
     */
    private $compoundParameter;

    public function setUp() : void
    {
        $this->compoundParameter = new CompoundTestParameter(['sku' => 5, 'name' => 'hello', 'dimension_3' => 'yep']);
    }

    public function testCompoundParameter()
    {
        $expect = [
            'id' => 5,
            'nm' => 'hello',
            'd3' => 'yep',
        ];

        $this->assertEquals($expect, $this->compoundParameter->getParameters());
    }

    public function testRequiredCompundParameter()
    {
        $this->expectException(\TheIconic\Tracking\GoogleAnalytics\Exception\InvalidCompoundParameterException::class);

        (new CompoundTestParameter(['sku' => 5]));
    }

    public function testInvalidDataCompundParameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new CompoundTestParameter(['sku' => 5, 'name' => 'hello', 'dimensions_3' => 'yep']));
    }
}
