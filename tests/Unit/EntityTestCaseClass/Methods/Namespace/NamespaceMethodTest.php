<?php

namespace Tests\Unit\EntityTestCaseClass\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class NamespaceMethodTest extends TestCase
{
    protected string $namespace = EntityTestCase::class;
    protected string $method = 'namespace';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace , $this->method);
        $this->assertTrue($isExist," $this->namespace class should have $this->method() method !!");
    }
    public function test_is_public():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $isPublic = $methodReflection->isPublic();
        $this->assertTrue($isPublic," $this->method() method in $this->namespace class should is public !!! ");
    }
    public function test_never_static():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$methodReflection->isStatic();
        $this->assertTrue($isNotStatic,"method $this->method() in $this->namespace class should is none static !!!");
    }
    public function test_never_final():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotFinal = !$methodReflection->isFinal();
        $this->assertTrue($isNotFinal,"method $this->method() in $this->namespace class dont be final !!! ");
    }
    public function test_never_abstract():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotAbstract = !$methodReflection->isAbstract();
        $this->assertTrue($isNotAbstract,"method $this->method() in $this->namespace class dont be abstract !!!");
    }
    public function test_should_have_return_type():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $hasReturnType = $methodReflection->hasReturnType() ;
        $this->assertTrue($hasReturnType,"no detect return value for  $this->method() in $this->namespace class ");
    }
    public function test_should_just_have_string_return_type():void{
        $expect = ['string'];
        sort($expect,SORT_STRING);
        $expect = implode('|',$expect);
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $returnTypes = (string)$methodReflection->getReturnType();
        if (strlen($returnTypes)!=0){
            $returnTypes = explode('|',$returnTypes);
            sort($returnTypes,SORT_STRING);
            $returnTypes = implode('|',$returnTypes);
            $this->assertEquals($expect , $returnTypes  , "return type for method : $this->method() in $this->namespace class should is $expect but is $returnTypes");
        }
        else
            $this->fail("no return type detect for method $this->method() in $this->namespace class !!! should return type is $expect");

    }
    public function test_no_return_null():void {
        $object=  app()->make($this->namespace) ;
        $result = $object->namespace();
        $this->assertNotNull($result,"method $this->method() in $this->namespace class cant return null !!");
    }
    public function test_should_return_string():void {
        $object = app()->make($this->namespace);
        $result = app()->call([$object,$this->method],[]);
        $this->assertIsString($result,"method $this->method() in $this->namespace class should return string !!!");
    }
    //@todo  to be continue !!!
}
