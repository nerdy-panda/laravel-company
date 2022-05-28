<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace\Parameters;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class ParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    protected string $method = 'setNamespace';
    public function test_just_have_single_parameter():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters();
        $this->assertEquals(1,$parametersCount,"method $this->method in $this->namespace should only one parameter");
    }
}
