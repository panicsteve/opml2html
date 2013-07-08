<?php

//
// opml2html.php
// Steven Frank (@stevenf) <http://stevenf.com/> 
//
// Consumes sample.opml and outputs a vanilla HTML unordered list.
// Based on sample code by Jacob Harvey <http://recently.rainweb.net/hive/1071/>
//

function displayChildrenRecursive($xmlObj, $depth = 0) 
{
	if ( count($xmlObj->children()) > 0 ) 
	{ 
		echo str_repeat("\t", $depth);
		echo "<ul>\n"; 
	}
	
	foreach ( $xmlObj->children() as $child ) 
	{
		echo str_repeat("\t", $depth + 1);
		echo "<li>{$child['text']}</li>\n";
		
 		displayChildrenRecursive($child, $depth + 1);
	}
	
	if ( count($xmlObj->children()) > 0 ) 
	{ 
		echo str_repeat("\t", $depth);
		echo "</ul>\n"; 
	}
}

$opmlFile = new SimpleXMLElement("sample.opml", null, true);
displayChildrenRecursive($opmlFile->body);
