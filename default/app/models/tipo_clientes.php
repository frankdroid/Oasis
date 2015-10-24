<?php
class Tipo_clientes extends ActiveRecord {
	
	
	public function Todos()
	{

		return $this->find();

	}
	
	
	public function Crear($tipo_cliente,$descripcion,$prefijo,$iva,$suplemento,$descuento,$comentario,$creado_por) 
	{
		return $this->create("tipo_cliente: $tipo_cliente",
							"descripcion: $descripcion",
							"prefijo: $prefijo",
							"iva: $iva",
							"suplemento: $suplemento",
							"descuento: $descuento",
							"comentario: $comentario",
							"creado_por: $creado_por");	
	}
	
}
?>