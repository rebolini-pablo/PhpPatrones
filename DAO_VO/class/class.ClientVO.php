<?php
	/**
	 * Class Client Value Object
	 * @author Rebolini Pablo <rebolini.pablo@gmail.com>
	 */
	class ClientVO{
		private $id;
		private $name;
		private $contact;
		
		public function getID(){
			return $this->id;
		}
	
		public function setID($id){
			$this->id = (int)$id;
		}

		public function getName(){
			return $this->name;
		}
	
		public function setName($name){
			if(!ctype_alpha($name)) throw new InvalidArgumentException('Se esperaba: Nombre');
			$this->name = $name;
		}

		public function getContact(){
			return $this->contact;
		}
	
		public function setContact($contact){
			if(!filter_var($contact, FILTER_VALIDATE_EMAIL)) throw new InvalidArgumentException('Se esperaba: Email');
			$this->contact = $contact;
		}
	
}