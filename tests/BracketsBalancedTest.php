<?php

namespace BracketsBalancedTest;

use PHPUnit\Framework\TestCase;
use BracketsBalanced\BracketsBalanced;
use InvalidArgumentException;

class BracketsBalancedTest extends TestCase
{
  protected static $valueIncorrectSymbols;
  protected static $notBalancedString;
  protected static $balancedString;
  protected static $exceptionClass;

  public static function setUpBeforeClass()
  {
    self::$valueIncorrectSymbols = '(test)()((()))';
    self::$notBalancedString = '()(())(';
    self::$balancedString = '()(())()';
    self::$exceptionClass = InvalidArgumentException::class;
  }

  public function test_construct()
  {
    $initValue = 'test';

    $balanced = new BracketsBalanced($initValue);

    $this->assertEquals($initValue, $balanced->string);
  }

  public function test_string_with_incorrect_symbols()
  {
    $this->expectException(self::$exceptionClass);

    $balanced = new BracketsBalanced(self::$valueIncorrectSymbols);
    $balanced->verifyStringSymbols();
  }

  public function test_empty_string()
  {
    $this->expectException(self::$exceptionClass);

    $balanced = new BracketsBalanced('');
    $balanced->verifyStringSymbols();
  }

  public function test_not_balanced_string()
  {
    $balanced = new BracketsBalanced(self::$notBalancedString);
    $this->assertFalse($balanced->isBalanced());
    $this->assertEmpty($balanced->errors);
  }

  public function test_balanced_string()
  {
    $balanced = new BracketsBalanced(self::$balancedString);
    $this->assertTrue($balanced->isBalanced());
    $this->assertEmpty($balanced->errors);
  }

  public function test_set_errors_messages()
  {
    $balanced = new BracketsBalanced('');
    $balanced->isBalanced();
    $this->assertCount(1, $balanced->errors);

    $balanced = new BracketsBalanced(self::$valueIncorrectSymbols);
    $balanced->isBalanced();
    $this->assertCount(1, $balanced->errors);


  }
}
