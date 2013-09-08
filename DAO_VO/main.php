<?php
	/**
	 * Archivo principal
	 * Ejemplo de implementacion de DAO + VO
	 *
	 *
	 *	Objetivo: Proveer acceso a un modelo sin revelar datos
	 *			  de su estructura interna.
	 *			  
	 *			  Es independiente del sistema de persistencia. 
	 *			  Podriamos cambiar el almacenamiento de una base
	 *			  de datos relacional a una noSQL sin modificar 
	 *			  el resto de la aplicacion.
	 *			  
	 *	 		  Provee una cantidad determinada de metodos que
	 *			  nos solucionan el problema de la persistencia de datos.
	 *	
	 *
	 *	Aplicacion: El patron DAO puede ser utilizado siempre que se
	 *				necesite abstraer el acceso a la persistencia.
	 *				Dentro de un framework MVC un Modelo bien 
	 *				puede ser un DAO.
	 *				El patron DAO crea una capa de abstraccion que no 
	 *				siempre es util
	 *				El patron DAO se puede, y en algunos casos se debe,
	 *				combinar con el patron VO, DTO, Factory, Repository.
	 *				Aunque no existen reglas de oro para esto.	
	 *				
	 *
	 * @author Rebolini Pablo <rebolini.pablo@gmail.com>
	 **/
	
	// Array de configuracion
	$config = [
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'name' => 'patrones'
	];
	
	// Creamos un nuevo Cliente
	$client = new ClientVO;
	$client->setID(1);
	$client->setName('Bombita');
	$client->setContact('petter@capusotto.net');
	
	// Creamos el DAO
	$clientDAO = new ClientDAO($config);
	
	// Almacenamos el Cliente
	$clientDAO->save($client);
	
	// Obtenemos un registro
	print_r( $clientDAO->getClientByID(1) );
	
	/**
	 * Simple Class Auto-Load
	 */
	function __autoload($className){
		require "class/class.{$className}.php";
	}