<?php
	/**
	*	SplObserver Pattern Main file
	*	@author Rebolini Pablo <rebolini.pablo@gmail.com>
	*
	*
	*	Objetivo:  Definir una relacion de uno a muchos entre objetos,
	*			   de forma tal, que cuando un objeto cambia de estado
	*			   se notifica y actualiza automaticamente todos los
	*			   objetos observadores. Provee una forma flexible de
	*			   comunicacion entre objetos.
	*	
	*
	*	Aplicacion: Uno o varios objetos necesitan ser notificados de 
	*				los cambios de otro objeto concreto.
	*				Las notificaciones se realizan de forma dinámica 
	*				en tiempo de ejecución.
	*				El objeto observable no necesita saber quien lo 
	*				observa exactamente, sino que es un observador,
	*				por lo que se consigue un mejor desacople.
	*				(Fuente de esta explicacion: http://es.davidhorat.com/publicaciones/articulos/patrones/observador/) 
	*				
	*				El patron SplObserver lo podemos combinar con cualquier
	*				metodo de persistencia de datos. Por ejemplo DAO
	*				
	*
	*
	*	El objetivo de este ejemplo es implementar una clase Memorandum encargada 
	*	de crear y notificar a los diferentes departamentos sobre un nuevo Memorandum
	*	interno. 
	*	Se espera que cada departamento sea capaz de obtener la notificacion en tiempo 
	*	de ejecucion y generar un memorandum del siguiente formato:
	*
	*	=================== MEMO ===================
	*	DESDE DEPARTAMENTO DE VENTAS:
	*
	*	Nuevo Memorandum urgente: Nueva metodologia de trabajo
	*	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	*
	*	Atte. Dpto CEO
	*	09/03/1969 15:33
	*	============================================
	*
	*/	
	$memo = [
		'titulo' 	=> 'Nueva metodologia de trabajo',
		'cuerpo' 	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
		'enviado' 	=> '09/03/1969 15:33',
		'creador' 	=> 'Dpto CEO',
		'prioridad' => 'urgente'
	];

	$memorandum = new Memorandum;
	$memorandum->crear($memo);
	
	$memorandum->attach(new DptoTecnico);
	$memorandum->attach(new DptoMarketing);	
	$memorandum->attach(new DptoVentas);
	
	$memorandum->enviar();
	
	// Simple Autoload
	function __autoload($className){
		require "class/class.{$className}.php";
	}	
?>