<?php

namespace BracketsBalanced;

class BracketsBalanced
{
  public $string;

  public function __construct($value)
  {
    $this->string = $value;
  }

  public function verifyStringSymbols()
  {
    $pattern = '#[\w\[\]]+#m';

    if (boolval(preg_match($pattern, $this->string)) !== False) {
      throw new \InvalidArgumentException;
    }

    return true;
  }

  public function isBalanced()
  {
    $this->verifyStringSymbols();

    $stack = new Stack();

    for ($i=0; $i < strlen($this->string); $i++) {
      $currentSymbol = $this->string[$i];

      if ($currentSymbol == '(') {
        $stack->push($currentSymbol);
      } else if ($currentSymbol == ')') {
        if ($stack->pop() == null) {
          return False;
        }
      }
    }

    return $stack->size() == 0;

  }
}
