# Langy
A simple PHP language management class.

## Installation
# Langy

A simple PHP language management class.


## Requirements

 - PHP 5.6 and upper.


## Installation

 1. Download the newest release from GitHub.
 2. Directly put "langy" named folder to somewhere that you can easily access.

## Usage

    <?php

    require_once __DIR__ . "/langy.php"; // Requireing Langy.

    $lang = new Langy;

    $lang->setLangDir("langy/languages"); // Set the folder that contains language files. (Language files must be ".lang" extension and must be in JSON format. See "languages/en.langy" for example.) 
    $lang->setLang("en"); // Set language. (This must be the name of the desired language file. Exclude extension.)

    ?>
    <!DOCTYPE html>
    <html>
    <head>
	    <title><?php echo $lang->echo("title"); // Echoing a language item from the language file. ?></title>
    </head>
    <body>
	    <center>
		    <h1><?php echo $lang->echo("pageContent->header"); ?></h1>
		    <h3>Langy developer: <?php echo $lang->echo("pageContent->classAuthor"); ?></h3><br>
		    <h2>An example text: <?php $lang->echo("pageContent->helloLangy->helloMsg"); // Echoing a language items child item from the language file. ?></h2>
		    <h2>An example text using variables: <?php echo $lang->echo("pageContent->helloLangy->helloMsgWithVars", ['iamavariable' => "Langy"]); // Echoing a language item from the language file but with assigning variables. You must add variables to the language files in this format: "{%variable_name%}". ?></h2>
	  </center>
    </body>
    </html>


## License

### [](https://github.com/BenEgeDeniz/tckn-validation#this-class-licensed-with-cc-by-nc-nd-40-see-httpscreativecommonsorglicensesby-nc-nd40)This class is licensed with CC BY-NC-ND 4.0 (See:  [https://creativecommons.org/licenses/by-nc-nd/4.0/](https://creativecommons.org/licenses/by-nc-nd/4.0/))
