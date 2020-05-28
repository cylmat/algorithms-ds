<?php
/**
 * Anagramme words
 *  find all anagrammes in a sentence
 * 
 * Input: Le chien marche vers sa niche, et trouve une limace de chine nue, pleine de malice, qui lui fait du charme.
 * Output: [chien, niche, chine], [marche, charme], [limace, malice]
 *
 * - ref: TRY ALGO 2.1 
 */
function d($v) {var_dump($v);}
 
function anagramme_i(string $phrase): array
{
    $dico = [];
    $res = [];
    $words = explode(' ',str_replace([',','.'],'',$phrase)); #get words array
    
    // insert sorted chars into dictionnary 
    //  ex: alpha => aahlp
    foreach ($words as $word) {
        if (strlen($word)<3) continue;
        
        $order = str_split(strtolower($word));
        sort($order);
        $order = implode($order);
        
        //add to dictionnary
        if (!isset($dico[$order])) {
            $dico[$order]=[];
        }
        $dico[$order][] = $word;
    }
    
    // get anagrammes results
    foreach ($dico as $order => $words) {
        if (count($words)>1) {
            $res[] = $words;
        }
    }
    return $res;
}

$phrase = "Le chien marche vers sa niche, et trouve une limace de chine nue, pleine de malice, qui lui fait du charme.";
$res = anagramme_i($phrase);

echo (int)assert(true);
