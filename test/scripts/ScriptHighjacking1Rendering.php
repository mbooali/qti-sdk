<?php
/**
 * Because CDATA nodes is not taken into account, no problem
 * with this one.
 */
use qtism\data\storage\xml\XmlDocument;
use qtism\runtime\rendering\markup\xhtml\XhtmlRenderingEngine;
use qtism\data\storage\StorageException;

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$doc = new XmlDocument();
try {
    $doc->load(dirname(__FILE__) . '/../samples/rendering/script_highjacking_1.xml');
}
catch (StorageException $e) {
    do {
        echo $e->getMessage() . "\n";
        $e = $e->getPrevious();
    }
    while($e);
    
    die();
}

$renderer = new XhtmlRenderingEngine();
$rendering = $renderer->render($doc->getDocumentComponent());
$rendering->formatOutput = true;

echo $rendering->saveXML();