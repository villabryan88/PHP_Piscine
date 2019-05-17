<?php

class Color 
{

	public $red;
	public $green;
	public $blue;
	public static $verbose = FALSE;

	static function doc()
	{
		return file_get_contents("Color.doc.txt");
	}
	
	public function __construct(array $kwargs)
	{
		if(array_key_exists('rgb', $kwargs))
		{
			$this->red = (int)($kwargs['rgb'] >> 16 & 255);
			$this->green = (int)(($kwargs['rgb'] >> 8) & 255);
			$this->blue = (int)($kwargs['rgb'] & 255);
		}
		if(array_key_exists('red', $kwargs))
			$this->red = (int)($kwargs['red']);
		if(array_key_exists('green', $kwargs))
			$this->green = (int)($kwargs['green']);
		if(array_key_exists('blue', $kwargs))
			$this->blue = (int)($kwargs['blue']);
		if (self::$verbose)
			echo $this." constructed.\n";
	}

	public function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}
	public function __destruct()
	{
		if (self::$verbose)
			echo $this." destructed.\n";
	}

	public function add(Color $other)
	{
		$red = $other->red + $this->red;
		$blue = $other->blue + $this->blue;
		$green = $other->green + $this->green;
		return (new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue)));
	}
	public function sub(Color $other)
	{
		$red = $this->red - $other->red;
		$blue = $this->blue - $other->blue;
		$green = $this->green - $other->green;
		return (new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue)));
	}
	public function mult($f)
	{
		$red = $this->red * $f;
		$blue = $this->blue * $f;
		$green = $this->green * $f;
		return (new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue)));
	}

}

?>
