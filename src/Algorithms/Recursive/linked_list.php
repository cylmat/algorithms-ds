<?php

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
