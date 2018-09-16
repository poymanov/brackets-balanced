<?php

namespace BracketsBalancedTest;

use PHPUnit\Framework\TestCase;
use BracketsBalanced\BracketsBalanced;

class BracketsBalancedTest extends TestCase
{
  public function test_construct()
  {
    $initValue = 'test';

    $balanced = new BracketsBalanced($initValue);

    $this->assertEquals($initValue, $balanced->string);
  }

  public function test_string_with_incorrect_symbols()
  {
    $this->expectException(\InvalidArgumentException::class);

    $balanced = new BracketsBalanced('(test)()((()))');
    $balanced->verifyStringSymbols();
  }

  public function test_not_balanced_string()
  {
    $balanced = new BracketsBalanced('()(())(');
    $this->assertFalse($balanced->isBalanced());
  }

  public function test_balanced_string()
  {
    $balanced = new BracketsBalanced('()(())()');
    $this->assertTrue($balanced->isBalanced());
  }
}
