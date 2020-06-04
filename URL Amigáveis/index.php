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

echo url('É .aqüí $onDê- à g%ent!@e tr4$balh$');
// esse-aqui-e-um-text0-exeeamplo

?>