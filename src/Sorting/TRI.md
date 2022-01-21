# Sorting algorithm

- Heap sort (tas) : onplace mais instable. Selection-sort like. Insert elements one by one with a heap.
- Intro sort : instable onplace. Begin as quicksort and switch to heapsort. Fast average performance and optimal worst-case.
- Merge sort (fusion) : efficient stable not onplace D&C sort. Divide to n sublists, then merge each.
- Quick sort : unstable, onplace with Sedgewick, D&C sort. Choose a pivot, then split lower and higher than pivot.
- Smoothsort : instable onplace by Dijkstra. Comparison-based like heapsort, O(n) with pre-sorted input
- Tree sort (arborescent) : unstable and not onplace. Build a binary tree then traverse it.
