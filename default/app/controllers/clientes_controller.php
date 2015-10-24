<?php

Load::models('clientes'); // Carga modelo Clientes
Load::models('identificacion'); // carga modelo identificacion
Load::models('tipo_clientes'); // carga modelo tipo_clientes

class ClientesController extends AppController {
	
	public $titulo_pagina = 'Oasis Service C.A.- Clientes'; //titulo de la pagina
	
	// funcion index
	public function index() 
    {
		
    }
	
	
	
	
	//funcion identificacion
	public function identificacion() 
	{
		// se obtienen los documentos registrados
		$docs = new Identificacion();
		$this->listaDocs = $docs->Todos();
	
         // Se verifica si el usuario envio el form (submit) 
        if(Input::hasPost('tipo_doc')){
			
			$tipo_doc = Input::post('tipo_doc');
			$descripcion = Input::post('descripcion');
			$prefijo = Input::post('prefijo');
			$comentario = Input::post('comentario');
 			$creado_por = $this->usuario;
            
			$identificacion = new Identificacion();
			
            // se verifica la operación
            if($identificacion->Crear($tipo_doc,$descripcion,$prefijo,$comentario,$creado_por)) 
			{
                Flash::valid('Operación exitosa');
                // recarga la pagina para cargar resultados
				Router::redirect("clientes/tipos");               
            } else {
                Flash::error('Falló Operación');
            }
        }
	}
	
	
	
	
	// funcion tipos de clientes
	public function tipos()
	{
		// se obtienen los documentos registrados
		$tipocliente = new Tipo_clientes();
		$this->listaTipos = $tipocliente->Todos();
	
         // Se verifica si el usuario envio el form (submit) 
        if(Input::hasPost('tipo_cliente')){
			
			$tipo_cliente = Input::post('tipo_cliente');
			$descripcion = Input::post('descripcion');
			$prefijo = Input::post('prefijo');
			$iva = Input::post('iva');
			$suplemento = Input::post('spto');
			$descuento = Input::post('dcto');
			$comentario = Input::post('comentario');
 			$creado_por = $this->usuario;

			
            // se verifica la operación
            if($tipocliente->Crear($tipo_cliente,$descripcion,$prefijo,$iva,$suplemento,$descuento,$comentario,$creado_por)) 
			{
                Flash::valid('Operación exitosa');
				// recarga la pagina para cargar resultados
				Router::redirect("clientes/tipos");
              
            } else {
                Flash::error('Falló Operación');
            }
        }
	}
	
	
	
	//funcion condicion de pago
	public function cond_pago()
	{
		
		
	}




	
	// funcion crear cliente
    public function create ()
    {
        /**
         * Se verifica si el usuario envio el form (submit) y si ademas 
         * dentro del array POST existe uno llamado "menus"
         * el cual aplica la autocarga de objeto para guardar los 
         * datos enviado por POST utilizando autocarga de objeto
         */
        if(Input::hasPost('clientes')){
            /**
             * se le pasa al modelo por constructor los datos del form y ActiveRecord recoge esos datos
             * y los asocia al campo correspondiente siempre y cuando se utilice la convención
             * model.campo
             */
            $cliente = new Clientes(Input::post('clientes'));
            //En caso que falle la operación de guardar
            if($cliente->create()){
                Flash::valid('Operación exitosa');
                //Eliminamos el POST, si no queremos que se vean en el form
                Input::delete();
                return;               
            }else{
                Flash::error('Falló Operación');
            }
        }
    }
	
}