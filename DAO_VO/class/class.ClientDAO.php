<?php 
	/**
	 * Class: Client Data Access Object
	 * @author Rebolini Pablo <rebolini.pablo@gmail.com>
	 */	
	class ClientDAO extends BaseDAO{
		function __construct(array $dbConfig){
			parent::__construct($dbConfig);
		}
		
		public function getClientByID($id){
			if(!is_int($id)) throw new InvalidArgumentException('Se esperaba: Entero');

			$_sql = "SELECT id, name, contact ".
				    "FROM clients ".
				    "WHERE id = {$id}";
			return $this->directQuery($_sql);
		}
		
		public function save(ClientVO $client){
			$_sql = "INSERT INTO `clients` ".
					"(`id`, `name`, `contact`) ".
					"VALUES ('{$client->getID()}','{$client->getName()}','{$client->getContact()}')";
			
			return $this->directQuery($_sql);
		}
	}