<?php

// GraphNode

class GNode 
{
    /** @var string */
    public $value; 
    /** @var ?self[] */
    public $childs = null;
  
    function __construct(?string $value = null)
    { 
        $this->value = $value;
    }
  
    function add(string $value): self
    { 
        $node = new self($value);
        
        if (null === $this->childs) {
            $this->childs = [];
        }
        
        $this->childs[] = $node; 
      
        return $this; 
    }
}
