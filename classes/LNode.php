<?php

class LNode
{
    /** @var string */
    public $value; 
    /** @var ?self */
    public $next = null;
  
    function __construct(?string $value = null)
    { 
        $this->value = $value;
    }
  
    function add(string $value): self
    { 
        $node = new self($value);
        $this->next = new self($value);
      
        return $node; 
    }
}
