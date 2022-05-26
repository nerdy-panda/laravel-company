<?php

namespace Tests\Unit\EntityTestCaseClass;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class EntityTestCaseClassTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue($isExist," missing class $this->namespace
         ");
    }
    public function test_dont_Be_final():void {
        $reflection = new \ReflectionClass($this->namespace);
        $isNotFinal = !$reflection->isFinal();
        $this->assertTrue($isNotFinal,"$this->namespace dont be final !!");
    }
}
