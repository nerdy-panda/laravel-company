<?php

namespace Tests\Unit\NamespaceableEntityTestCaseClass\Properties;

use PHPUnit\Framework\TestCase;
use Tests\NamespaceableEntityTestCase;

class NamespacePropertyTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCase::class ;
    protected string $property = 'namespace';
    //@todo can create propertiable interface , for class test , trait test, ...
    //@todo these method can move tod trait -> for use user : dont repeat in any property test case !!!

    public function test_should_exist ():void {
        $isExist = property_exists($this->namespace,$this->property);
        $this->assertTrue($isExist,"no exist \$namespace property in $this->namespace ");
    }
    public function test_no_define_in_parent_class():void {
        $propertyReflection = new \ReflectionProperty($this->namespace,$this->property);
        $this->assertEquals(
            $this->namespace,
            $propertyReflection->class ,
            "property \$$this->property should define in class $this->namespace"
        );
    }
    public function test_should_is_Protected():void {
        $namespaceInfo = new \ReflectionProperty($this->namespace , 'namespace');
        $isProtected = $namespaceInfo->isProtected();
        $this->assertTrue($isProtected,"should access modifier for \$namespace property in class => $this->namespace is protected !!! ");
    }
    public function test_is_none_static():void {
        //@todo isStatic() , isNoneStatic()
        $propertyReflection = new \ReflectionProperty($this->namespace , $this->property);
        $isNoneStatic = !$propertyReflection->isStatic();
        $this->assertTrue(
            $isNoneStatic ,
            "property $$this->property in class $this->namespace should define in the form of none static !!! "
        );
    }
    public function test_should_is_string():void{
        //@todo check with union type -> may be have bug
        $namespaceReflection = new \ReflectionProperty($this->namespace , 'namespace');
        $realType = (string)$namespaceReflection->getType();
        $expected = 'string';
        $this->assertEquals($expected ,$realType,"data type for \$namespace property should is string !!! ");
    }
    public function test_no_has_default_value():void {
        $propertyReflection = new \ReflectionProperty($this->namespace,$this->property);
        $isNoDefaultValue = !$propertyReflection->hasDefaultValue();
        $this->assertTrue(
            $isNoDefaultValue ,
            "property \$$this->property in $this->namespace class should no have default value "
        );
    }
    public function test_should_have_null_default_value():void {
        $propertyReflection = new \ReflectionProperty($this->namespace,$this->property);
        $defaultValue = $propertyReflection->getDefaultValue();
        $this->assertEquals(
            null, $defaultValue ,
            "property $$this->property should have null default value !!!"
        );
    }
}