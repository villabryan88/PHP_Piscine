<?php

class NightsWatch
{
	private $fighters;

	public function recruit($person)
	{
		if(method_exists($person, "fight"))
			$this->fighters[] = $person;
	}

	public function fight()
	{
		foreach ($this->fighters as $fighter)
		{
			$fighter->fight();
		}
	}
}

?>
