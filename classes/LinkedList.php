<?php

/**
 * $list = new LinkList;
 * $list->push(3);
 * $list->push('six');
 * $list->ins(1,'ert');
 */
class LinkedList
{
    private $head;
    private $count = 0;

    static function createNodeFactory()
    {
        return new class
        {
            public $data, $next;
        };
    }

    function push($val)
    {
        $li = self::createNodeFactory();
        $li->data = $val;
        $li->next = null; //last

        if (null === $this->head) { //first object
            $this->head = $li;
        } else {
            $nextObj = $this->head; //at least one object
            while (null !== $nextObj->next) {
                $nextObj = $nextObj->next;
            }
            $nextObj->next = $li;
        }
        $this->count++;
    } //push

    function pop()
    {
        if ($this->head === null) 
            return;

        $nextObj = $this->head;
        $last = $this->head;
        while (null !== $nextObj->next) {
            $last = &$nextObj->next;
            $nextObj = $nextObj->next;
        }
        $this->count--;
        $last = null;
    } //pop

    function get($place = 0)
    {
        if (null === $this->head)
            return null;

        $nextObj = $this->head;
        $count = 0;
        while (null !== $nextObj->next) {
            if ($count === $place) {
                return $nextObj;
            }
            $nextObj = $nextObj->next;
            $count++;
        }
        if ($place > $count)
            return null;
        
        return $nextObj; //first one
    }

    function count()
    {
        return $this->count;
    }

    function ins($place, $val)
    {
        if (null === $this->head)
            return null;

        $li = self::createNodeFactory();
        $li->data = $val;

        $nextObj = $this->head;
        $count = 0;
        while (null !== $nextObj) {
            if ($count === $place) {
                $nextObj->next = $li;
                $li->next = $nextObj->next;
                return;
            }
            $nextObj = $nextObj->next;
            $count++;
        }
    }

    function rem($place)
    {
    }

    function out()
    {
        if (null === $this->head)
            echo 'no data';

        $nextObj = $this->head;
        while (null !== $nextObj->next) {
            echo $nextObj->data . ' - ';
            $nextObj = $nextObj->next;
        }
        echo $nextObj->data;
    } //out

} //class
