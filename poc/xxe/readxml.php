<?php

$xml_string = file_get_contents('xxe.xml');

$dom = new DOMDocument();
$dom->loadXML($xml_string, LIBXML_NOENT | LIBXML_DTDLOAD);
$xml = simplexml_import_dom($dom);

echo '
    <b>NOME:</b> '.$xml->nome.
    '<br>
    <b>COGNOME</b>: '.$xml->cognome;
