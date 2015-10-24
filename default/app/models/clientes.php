<?php
class Clientes extends ActiveRecord{
	
	public function todos()
	{

		return $this->find();

	}
	
	
	
	
	public function Buscar($cedula) 
	{	
		return $this->find_by_identificacion($cedula);
	}
	
}
?>