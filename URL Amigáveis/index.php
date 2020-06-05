<?php

function Url($text){
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if(empty($text)):
        return 'n-a';
    endif;
    return $text;
}

echo Url('É .aqüí $onDê- à g%ent!@e tr4$balh$');

?>
