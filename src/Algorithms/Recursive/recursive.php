<?php
/**
 * 
 * refs:
 *   https://www.geeksforgeeks.org/recursion-practice-problems-solutions/
 *   https://www.techiedelight.com/recursion-practice-problems-with-solutions/
 */

/**
* double boucle iterative to recursive
*/
/**
* iterative way
*/
function displayRectangle(int $nbLignes, int $nbColonnes, string $caractere): void
{
   for ($ligne = 0; $ligne < $nbLignes; $ligne++) {
      for ($colonne = 0; $colonne < $nbColonnes; $colonne++)
           echo ($caractere);
      echo ("\n"); //lorsque nbColonnes==0: skip le "echo $caractere";
   } //->cas de Base1
}

/**
* recursive way
*/
function displayRectangleR(int $nbLignes, int $nbColonnes, string $caractere): void
{
    //Base1
   if ($nbLignes == 1)
      return;

   if ($nbColonnes == 0) {
      echo("\n");
      return;
   }

   echo($caractere);
   displayRectangle(1, $nbColonnes - 1, $caractere);
   displayRectangle($nbLignes - 1, $nbColonnes, $caractere);
}

ob_start();
displayRectangleR(2, 3, 't');

$res = explode("\n", trim(ob_get_clean()));

validates($res, ['ttt', 'ttt']);
