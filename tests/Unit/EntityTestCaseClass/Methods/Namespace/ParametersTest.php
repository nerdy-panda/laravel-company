<?php

namespace Tests\Unit\EntityTestCaseClass\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    protected string $method = 'namespace';
    public function test_no_have_any_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $parameters = $methodReflection->getParameters();
        $this->assertEmpty($parameters , "$this->method() in $this->namespace class :  should no have any parameter !!! ");
    }
}
