<?php
class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public	static $verbose = FALSE;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		if(array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1.0;
		if(array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('rgb' => 0xFFFFFF));
		if(self::$verbose)
			echo $this." constructed\n";	

	}

	public function __destruct()
	{
		if(self::$verbose)
			echo $this." destructed\n";	

	}

	public function __toString()
	{
		if (!self::$verbose)
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

	public function doc()
	{
		return file_get_contents("Vertex.doc.txt");
	}

}
?>
