<?php
class Productos extends ActiveRecord {
		
	public function Todos()
	{
		return $this->paginate();
	}
		
	public function Buscar($idproducto) {
		return $this->find_by_idproducto($idproducto);	
	}
		
}

?>