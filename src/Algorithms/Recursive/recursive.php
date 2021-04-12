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
function afficheRectangle(int $nbLignes, int $nbColonnes, string $caractere): void
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
function afficheRectangleR(int $nbLignes, int $nbColonnes, string $caractere): void
{
    //Base1
   if ($nbLignes == 0)
      return;

   if ($nbColonnes == 0) {
      echo("\n");
      return;
   }

    echo($caractere);
    afficheRectangle(1, $nbColonnes - 1, $caractere);
    afficheRectangle($nbLignes - 1, $nbColonnes, $caractere);
}

echos(true);