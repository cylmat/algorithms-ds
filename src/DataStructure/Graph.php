<?php

/**
 * https://github.com/BlueM/Tree
 * https://github.com/algb12/GraphDS
 * https://github.com/nicmart/Tree
*/

return '1'; // can't be tested without dependencies 

use Tree\Node\Node;
use GraphDS\Graph\DirectedGraph as DG;

/**
* nicmart/tree
*/
class N { static function create($value) {return new Node($value);} }
$r = N::create('slash');
$r->setValue('alpha');
$r->getValue();
$r->addChild(N::create('beta'));
$t = new Tree\Builder\NodeBuilder;
$t->value('A')->leaf('B');

/**
* bluem/tree
*/
$data = [
    ['id' => 1, 'parent' => 0, 'title' => 'Node 1'],
    ['id' => 3, 'parent' => 0, 'title' => 'Node 3'],
    ['id' => 2, 'parent' => 1, 'title' => 'Node 1.1'],
    ['id' => 4, 'parent' => 1, 'title' => 'Node 1.2'],
    ['id' => 4, 'parent' => 3, 'title' => 'Node 3.1'],
];
$tree = new BlueM\Tree($data);
$roots = $tree->getRootNodes();
$node4 = $tree->getNodeById(4);
foreach($roots as $node) {
    $level = $node->getLevel();
    $value = $node->id;
    $value = $node->getId();
}
$node4->getId();
$node4->toArray();
$parentNode = $node->getParent();
$siblings = $node->getSiblings();

/**
* algb12/graph-ds
*/
$dg = new DG();
$dg->addVertex('o');
$dg->vertices['o']->setValue(32);
$dg->vertices['o']->getValue();
$dg->addVertex('p');
