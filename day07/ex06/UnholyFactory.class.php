<?php

class UnholyFactory
{
	private $_prototypes = array();

	public function absorb($fighter)
	{
		if(get_parent_class($fighter) != "Fighter")
			echo "(Factory can't absorb this, it's not a fighter)\n";
		elseif ($this->havePrototype($fighter->type))
			echo "(Factory already absorbed a fighter of type $fighter->type)\n";
		else
		{
			$this->_prototypes[] = $fighter;	
			echo "(Factory absorbed a fighter of type $fighter->type)\n";
		}
	}

	public function fabricate($fighter)
	{
		if($prototype = $this->havePrototype($fighter))
		{
			echo "(Factory fabricates a fighter of type $fighter)\n";
			return $prototype;
		}
		echo "(Factory hasn't absorbed any fighter of type $fighter)\n";
		return NULL;
	}

	private function havePrototype($type)
	{
		foreach ($this->_prototypes as $prototype)
		{
			if ($prototype->type == $type)
				return $prototype;
		}
		return NULL;
	}
}

?>
