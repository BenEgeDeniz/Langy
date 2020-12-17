<?php

// Requiring Langy.
require_once __DIR__ . "/src/langy.php"; 

$lang = new Langy;

// Setting the language file extension. (If you don't set it, this will default to "langy".)
$lang->setLangExt("langy");

// Setting the folder that contains language files. (Language files must end with the extension you set and must be in JSON format.) 
$lang->setLangDir("languages"); 

// Setting the language. (This must be the name of the desired language file. Exclude extension.)
$lang->setLang("en"); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	<?php
		// Directly printing language item.
		$lang->echo("title");
	?>
	</title>
</head>
<body>
    <div style="text-align:center">
		<h1><?php 
			// Assigning language item to variable.
			$text = $lang->get("pageContent.header");
			echo $text;
		?>
		</h1>
	    <h3>Langy developer: <?php $lang->echo("pageContent.classAuthor"); ?></h3><br>
	    <h2>An example text: <?php $lang->echo("pageContent.helloLangy.helloMsg"); ?></h2>
	    <h2>An example text with using variables: <?php $lang->echo("pageContent.helloLangy.helloMsgWithVars", ["iamavariable" => "Langy"]); ?></h2>
	</div>
</body>
</html>
