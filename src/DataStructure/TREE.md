# Tree data structure

- Arbre binaire: Arbre binaire de recherche, Arbre cartésien ...
- Arbre équilibré: AVL, bicolore, Arbre splay, Treap (Arbre-tas)
- Arbre B: B*-tree, Bx-tree, UB-tree, 2-3 tree, (a,b)-tree, Dancing tree, Htree
- Trie: Arbre des suffixes, radix, ternaire de recherche
- Partition binaire: Quadtree, Arbre kd, vp-tree ...
- Arbres non binaires: Arbre exponentiel, Fusion tree, arbre d'intervalles, range tree ...
- Arbre de base: R*-arbre, M-tree (en), arbre de segments, Hilbert R-tree, Priority R-tree
- Autres:
  + Merkle, Arbre couvrant, Arbre syntaxique, Finger tree, arbre métrique, Cover tree
  + BK-tree, Doubly chained tree, iDistance, Fenwick tree, Tas binomial, Tas de Fibonacci

## Traversal
- PreOrder (Deep First Search): Process the root and traversals of the left and right subtrees (as deeply to the LEFT as possible).
- InOrder: Follows the left subtree to the deepest child, then root and right subtree (^)
- PostOrder: Follows the left subtree to the deepest child, follows the left and right subtrees before processing the root. (_\)
- LevelOrder (Breadth First Search): Algorithm that processes the root, followed by the children (from left to right, /_)

Sample:  
| | | | | | | |
|-|-|-|-|-|-|-|
||||4||||  
||2||||6||
|1||3||5||7|  

---
**@ref**: 
- https://fr.wikipedia.org/wiki/Cat%C3%A9gorie:Arbre_(structure_de_donn%C3%A9es)

+ https://fr.wikipedia.org/wiki/Arbre_enracin%C3%A9 (fr)
+ https://en.wikipedia.org/wiki/Tree_(data_structure) (en)
