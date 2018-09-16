<?php

namespace BracketsBalancedTest;

use PHPUnit\Framework\TestCase;
use BracketsBalanced\Stack;

class StackTest extends TestCase
{
  public function test_push_value()
  {
    $stack = new Stack();
    $stack->push('test');

    $this->assertCount(1, $stack->data);
  }

  public function test_get_size()
  {
    $stack = new Stack();
    $this->assertEmpty($stack->data);

    $stack->push('test');
    $this->assertCount(1, $stack->data);

    $stack->push('test2');
    $this->assertCount(2, $stack->data);
  }

  public function test_pop()
  {
    $stack = new Stack();
    $this->assertNull($stack->pop());

    $stack->push('test');
    $stack->push('test2');

    $this->assertEquals('test2', $stack->pop());
    $this->assertCount(1, $stack->data);
  }

  public function test_peak()
  {
    $stack = new Stack();
    $this->assertNull($stack->pop());

    $stack->push('test');
    $stack->push('test2');

    $this->assertEquals('test2', $stack->peak());

    $this->assertCount(2, $stack->data);
  }
}
