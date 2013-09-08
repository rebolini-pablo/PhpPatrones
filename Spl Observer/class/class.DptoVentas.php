<?php
	/**
	*	SplObserver DptoVentas Class
	*	@author Rebolini Pablo <rebolini.pablo@gmail.com>
	*/
	class DptoVentas implements SplObserver{
		
		function __construct(){
			/*...*/
		}
		
		public function update(SplSubject $memorandum){
			$memorandum = (object)$memorandum->leer();
			echo "=================== MEMO ===================" . PHP_EOL .
				 "DESDE DEPARTAMENTO DE VENTAS:". PHP_EOL . PHP_EOL .
				 "Nuevo Memorandum {$memorandum->prioridad}: {$memorandum->titulo}". PHP_EOL .
				 "{$memorandum->cuerpo}". PHP_EOL . PHP_EOL .
				 "Atte. {$memorandum->creador}". PHP_EOL .
				 "{$memorandum->enviado}" . PHP_EOL . 
				 "============================================";
		}
	
	}