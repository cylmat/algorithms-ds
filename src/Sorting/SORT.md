# Sorting algorithm

Simple
---
- Insertion
- Selection

Efficient
---
- Heap (tas) : [instable, inplace]. Selection-sort like. Insert elements one by one with a heap.
- Merge (fusion) : [stable, not inplace, D&C]. Divide to n sublists, then merge each.
- Quick : [unstable, inplace with Sedgewick, D&C]. Choose a pivot, then split lower and higher than pivot.
- Shell

Distribution
---
- Radix (digit LSD, MSD)

Others
---
- Bubble
- Exchange
- Intro : [instable, inplace]. Begin as quicksort and switch to heapsort. Fast average performance and optimal worst-case.
- Smooth : [instable, inplace] by Dijkstra. Comparison-based like heapsort, O(n) with pre-sorted input
- Tree (arborescent) : [unstable, not inplace] (slow one). Build a binary tree then traverse it.

Non-comparison
---
- Pigeonhole
- Bucket (bin)

---
**@ref**: https://en.wikipedia.org/wiki/Sorting_algorithm
