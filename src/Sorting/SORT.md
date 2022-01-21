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
- Shell (+insert)

Others
---
- Bubble : ...(see cocktail)
- Comb (+bubble)
- Exchange
- Intro : [instable, inplace]. Begin as quicksort and switch to heapsort. Fast average performance and optimal worst-case.
- Smooth : [instable, inplace] by Dijkstra. Comparison-based like heapsort, O(n) with pre-sorted input
- Tree (arborescent) : [unstable, not inplace] (slow one). Build a binary tree then traverse it.

Distribution
---
- Bucket (bin)
- Radix (digit LSD, MSD)

Non-comparison
---
- Counting
- Pigeonhole

## Selection
- Hoare quickselect : [inplace, O(n)]

## Problems
- Secretary selection problem

---
**@ref**: https://en.wikipedia.org/wiki/Sorting_algorithm
