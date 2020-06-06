/**
 * Bubble sort
 * 
 *  I: geeksforgeeks
 *  O: eeeefggkkorss
 * 
 * - ref: https://www.geeksforgeeks.org/sorting-algorithms
 */
// for one char
// switch n-1 <> n
// until 0
function string_sort(string $str, int $i): string
{
    if (0==$i) {
        return $str;
    }
    
    //switch
    if ($str{$i-1} > $str{$i}) {
        if (!isset($str{$i+1})) {
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1};
        } else {
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1} . substr($str, $i+1);
        }
    }
    
    // 
    return string_sort($str, $i-1);
}

$str_sort = 'geeksforgeeks';
for ($i=0; $i<strlen($str_sort); $i++) {
    $str_sort = string_sort($str_sort, strlen($str_sort)-1);
}

echo (int)assert($str_sort === 'eeeefggkkorss');
