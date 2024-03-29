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
$phrase = "Le chien marche vers sa niche, et trouve une limace de chine.";
$res = anagramme_i($phrase);

validates($res, [['chien', 'niche', 'chine']]);

/**
 * Recursive
 * 
 */
// 
function anagramme_r(array $words, int $n, int $i=0, array $dico=[]): array
{
     //base case
    if ($i==$n) {
        return $dico;
    }
    
    //get ordered letters from word
    $order = str_split($words[$i]);
    sort($order);
    $order = implode($order);
    
   //insert into dico if len>2
    if (strlen($order)>2) {
        if (!isset($dico[$order])) {
            $dico[$order] = [];
        } 
        $dico[$order][] = $words[$i];
    }
    
    //continue with others words
    $dico = anagramme_r($words, $n, $i+1, $dico);
    
    //main call
    if(0==$i) {
        $res = [];
        foreach ($dico as $item) {
            if (count($item)>1){
                $res[] = $item;
            }
        } 
        $dico = $res;
    }
    
    return $dico;
}

$phrase = "Le chien marche vers sa niche, et trouve une limace de chine.";
$phrase = explode(' ', strtolower(str_replace([',','.'],'',$phrase)));

$res = anagramme_r($phrase, count($phrase));
validates($res, [['chien', 'niche', 'chine']]);
