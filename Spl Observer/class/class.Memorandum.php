<?php
	/**
	*	SplObserver Memorandum Class
	*	@author Rebolini Pablo <rebolini.pablo@gmail.com>
	*/
	class Memorandum implements SplSubject{
		
		private $departamentos = [];
		private $memorandum;
		
		function __construct(){
		
		}
		
		public function crear(array $datos){
			$this->memorandum = $datos;
		}
		
		public function enviar(){
			$this->notify();
		}	
		
		public function leer(){
			return $this->memorandum;
		}
		
		public function attach(SplObserver $dpto){
			$id = spl_object_hash($dpto);
			$this->departamentos[$id] = $dpto;
		}
		
		public function detach(SplObserver $dpto){
			$id = spl_object_hash($dpto);
			unset($this->departamentos[$id]);
		}
		
		public function notify(){
			foreach($this->departamentos as $dpto){
				$dpto->update($this);
			}
		}
	
	}