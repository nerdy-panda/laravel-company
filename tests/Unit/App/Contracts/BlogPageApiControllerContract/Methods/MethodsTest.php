<?php

namespace Tests\Unit\App\Contracts\BlogPageApiControllerContract\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\BlogPageApiControllerContract as Entity;

class MethodsTest extends TestCase
{
    protected string $namespace = Entity::class ;
    public function test_no_have_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods() ;
        $methods = array_filter(
            $methods ,
            function (\ReflectionMethod $method){
                return $method->getDeclaringClass()->name == $this->namespace;
            }
        );
        $message = '';
        //@todo no expective
        if (!empty($methods)){
            $message .= "interface $this->namespace should no have any method ";
            $methods = array_map(
                function (\ReflectionMethod $method){
                    return $method->name;
                } , $methods );
            $message.="but have ".implode('() , ',$methods).'()';
        }
        $this->assertEmpty($methods,$message);

    }
}
