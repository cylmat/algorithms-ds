# Sorting algorithm

Simple
---
- Insertion : 
- Selection :

Efficient
---
- Heap (tas) : inplace but instable. Selection-sort like. Insert elements one by one with a heap.
- Merge (fusion) : efficient stable but not inplace D&C sort. Divide to n sublists, then merge each.
- Quick : inplace with Sedgewick but unstable, D&C sort. Choose a pivot, then split lower and higher than pivot.

Distribution
---
- Radix (digit) : 

Others
---
- Intro : instable inplace. Begin as quicksort and switch to heapsort. Fast average performance and optimal worst-case.
- Smooth : inplace and instable by Dijkstra. Comparison-based like heapsort, O(n) with pre-sorted input
- Tree (arborescent) : unstable and not inplace (slow one). Build a binary tree then traverse it.

---
**@ref**: https://en.wikipedia.org/wiki/Sorting_algorithm
