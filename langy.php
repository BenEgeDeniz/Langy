<?php

/**
 * Langy - PHP language management system
 * Developer: TimberLock
 * Developer Website: benegedeniz.com
 */

class Langy
{
	
	private $languagesDir;
	private $lang;
	private $langDir;

	public function setLangDir($dir)
	{
		$this->languagesDir = $dir;
		unset($dir);
	}

	public function setLang($langCode)
	{
		$this->lang = $langCode . ".langy";
		$this->langDir = $this->languagesDir . "/" . $this->lang;
		unset($langCode);
	}

	private function objectStringify($path_str)
	{
		$val = null;

		$path = explode('->', $path_str);
		unset($path_str);
		$node = json_decode(file_get_contents($this->langDir));

		while (($prop = array_shift($path)) !== null)
		{
			if (!is_object($node) || !property_exists($node, $prop))
			{
				$val = null;
				break;
			}

			$val = $node->$prop;
			$node = $node->$prop;
		}

		unset($path, $node, $prop);
		return $val;
		unset($val);
	}

	public function echo($attr, $variables = false)
	{
		if ($variables === false)
			$return = $this->objectStringify($attr);
		else
		{
			$variables = array_flip($variables);

    		foreach($variables as $key => &$val)
    		{ 
    			$val = "{%" . $val . "%}";
    			unset($key, $val);
    		}

    		$variables = array_flip($variables);
			$return = strtr($this->objectStringify($attr), $variables);
		}

		unset($attr, $variables);
		return $return;
		unset($return);
	}

}

?>