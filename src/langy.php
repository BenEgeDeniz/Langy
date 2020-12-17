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
	private $langFileExt = 'langy'; 

	public function setLangDir($dir)
	{
		$this->languagesDir = $dir;
		unset($dir);
	}

	public function setLangExt($ext)
	{
		$this->langFileExt = $ext;
		unset($ext);
	}

	public function setLang($langCode)
	{
		$this->lang = $langCode.'.'.$this->langFileExt;
		$this->langDir = $this->languagesDir.'/'.$this->lang;
		unset($langCode);
	}

	private function objectStringify($path_str)
	{
		$val = null;

		$path = explode('.', $path_str);
		unset($path_str);

		$filePath = realpath($this->langDir);

		if($filePath !== false)
		{
			$node = json_decode(file_get_contents($filePath));

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
		}
		else
		{
			$val = null;
		}

		unset($path, $node, $prop, $filePath);
		return $val;
	}

	public function get($attr, $variables = false)
	{
		if ($variables === false)
			$return = $this->objectStringify($attr);
		else
		{
			$variables = array_flip($variables);

    		foreach($variables as $key => &$val)
    		{ 
    			$val = '{%'.$val.'%}';
    			unset($key, $val);
    		}

    		$variables = array_flip($variables);
			$return = strtr($this->objectStringify($attr), $variables);
		}
		unset($variables);
		return is_null($return) ? $attr : $return;
	}

	public function echo($attr, $variables = false)
	{
		echo $this->get($attr, $variables);
		unset($attr, $variables);
	}
}

?>
