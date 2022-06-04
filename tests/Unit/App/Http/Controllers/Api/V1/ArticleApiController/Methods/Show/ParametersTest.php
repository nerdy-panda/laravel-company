<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\ArticleApiController\Methods\Show;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\V1\ArticleApiController as Entity;

class ParametersTest extends TestCase
{
    protected string $namespace = Entity::class ;
    protected string $method = 'show';
    public function test_no_have_parameter():void{
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters() ;
        $expect = 0 ;
        $this->assertEquals($expect , $parametersCount , "method $this->method() in $this->namespace controller should no have any parameter !!!");
    }
}