<?php

use DataStructure\Node;

function linked_list(?Node $head, $data) { //Node(->data)(->next)
    if(null === $head) {
        $head = new Node($data);
        return $head;
    }
    // recursif way
    $head->next = $this->linked_list($head->next, $data);

    // iteratif way
    $child = $head; 
    while($child->next !== null) 
        $child = $child->next; 
    $child->next = new Node($data);

    return $head;
}

function removeDuplicates($head) {
      $point=$head;
      while (null !== $point->next) {
          if ($point->data == $point->next->data) {
              $point->next = $point->next->next;
          } else {
              $point = $point->next;
          }
      }
      return $head;
}

function removeDuplicates_rec($head) {
      $n = $head->next;
      if ($n === null) { //last
          return $head;
      }
      if ($head->data === $n->data) {
          $head->next = $n->next;
      }
      $this->removeDuplicates($head->next);
      return $head;
}
