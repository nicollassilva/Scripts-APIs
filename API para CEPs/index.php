<?php

    require "CepInfo.class.php";

$CEP = new CEP('SEU-CEP-AQUI');
print_r($CEP->getData());
echo "<br>";
print_r($CEP->getOneInfo('logradouro'));
echo "<br>";
print_r($CEP->getMoreInfos(['logradouro', 'uf', 'ibge']));
