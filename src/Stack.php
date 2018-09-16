<?php

namespace BracketsBalanced;

class Stack
{
  protected $data = [];

  public function pop()
  {
    if ($this->size() == 0) {
      return null;
    }

    return array_pop($this->data);
  }

  public function push($value)
  {
    $this->data[] = $value;
  }

  public function peak()
  {
    if ($this->size() == 0) {
      return null;
    }

    return array_slice($this->data, -1)[0];
  }

  public function size()
  {
    return count($this->data);
  }

  function __get($property)
  {
      return $this->$property;
  }
}
