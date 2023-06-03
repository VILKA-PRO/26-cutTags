<?php
ini_set('display_errors', 'off');

$dom = new DOMDocument();
$dom->loadHTMLFile('index.php');

$metaTags = $dom->getElementsByTagName('meta');
$titleTag = $dom->getElementsByTagName('title')->item(0);

$tagsToRemove = [];

foreach ($metaTags as $metaTag) {
    $name = $metaTag->getAttribute('name');
    
    if ($name === 'description' || $name === 'keywords') {
        $tagsToRemove[] = $metaTag;
    }
}

foreach ($tagsToRemove as $tag) {
    $tag->parentNode->removeChild($tag);
}

if ($titleTag) {
    $titleTag->parentNode->removeChild($titleTag);
}

$modifiedHtml = $dom->saveHTML();
echo $modifiedHtml;

?>