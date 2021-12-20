<?php

namespace DataStructure;

if (!class_exists('\DataStructure\Node')):
class Node 
{
    /** @var string */
    private $value; 
    /** @var ?Node[] */
    private $childs = null;
  
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
endif;
