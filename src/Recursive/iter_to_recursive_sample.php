<?php

/**
 * Double loop iterative to recursive
 *
 * @see
 *   https://www.geeksforgeeks.org/recursion-practice-problems-solutions/
 *   https://www.techiedelight.com/recursion-practice-problems-with-solutions/
 */
$display_rec = '';
function displayRectangle_iter(int $nbLignes, int $nbColonnes, string $caractere): void
{
    global $display_rec;

   for ($ligne = 0; $ligne < $nbLignes; $ligne++) {
      for ($colonne = 0; $colonne < $nbColonnes; $colonne++)
           $display_rec .= $caractere;
      $display_rec .= "\n"; // when nbColonnes==0: skip the "echo $caractere";
   } //->cas de Base1
}
displayRectangle_iter(2, 3, 't');
validates($display_rec, "ttt\nttt\n");

/**
* recursive way
*/
$display_rec = '';
function displayRectangleR(int $nbLignes, int $nbColonnes, string $caractere): void
{
    global $display_rec;

    //Base1
   if ($nbLignes == 0)
      return;

   if ($nbColonnes == 0) {
      $display_rec .= "\n";
      return;
   }

   $display_rec .= $caractere;
   displayRectangleR(1, $nbColonnes - 1, $caractere);
   displayRectangleR($nbLignes - 1, $nbColonnes, $caractere);
}

displayRectangleR(2, 3, 't');
validates($display_rec, "ttt\nttt\n");
