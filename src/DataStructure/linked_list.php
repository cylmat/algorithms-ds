<?php

class Node
{
    public $value, $next;
    function __construct(?string $value=null) { $this->value = $value; }
}

function createNodeList(Node $head, string $data)
{
    if (null === $head) {
        $head = new Node($data);
        return $head;
    }

    // iteratif way
    $child = $head; 
    $newNode = new Node($data);
    while ($child->next !== null) 
        $child = $child->next; 
    $child->next = $newNode;

    return $newNode;
}

function createLinkedList_rec(Node $head, string $data)
{
    if (null === $head) {
        $head = new Node($data);
        return $head;
    }
    // recursif way
    $head->next = createLinkedList_rec($head->next, $data);

    // iteratif way
    $child = $head; 
    while ($child->next !== null) 
        $child = $child->next; 
    $child->next = new Node($data);

    return $head;
}

function removeDuplicates(LNode $head) {
      $point = $head;
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

$node1 = createNodeList(new Node('head'), 'my-val1');
$node2 = createNodeList($node1, 'my-val2');

validates('my-val2', $node2->value);
