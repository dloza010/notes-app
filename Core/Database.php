<?php
	//unless you specify otherwise, every single class reference will assume the namespace
	namespace Core;
	// we're telling our file that will use this namespace
	use PDO;
	class Database
	{
		///////////////
		/// Variables
		public $connection;
		public $statement;
		
		///////////////
		/// Constructor
		public function __construct($config, $username = 'root', $password = '')
		{
			//dsn => data source name
			$dsn = 'mysql:'.http_build_query($config, '', ';');
			
			//Connecting to database by creating a new PDO instance
			$this->connection = new PDO($dsn, $username, $password, [
				//this will return the results as an associated array
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
		}
		
		
		///////////////
		/// Methods
		public function query($query, $params = []): Database
		{
			
			
			//the query you want to run
			$this->statement = $this->connection->prepare($query);
			//execute the query
			$this->statement->execute($params);
			//fetch all of your results from table
			return $this;
		}
		
		public function find()
		{
			//$statement->fetch();
			return $this->statement->fetch();
		}
		
		public function findOrFail()
		{
			$result = $this->find();
			
			if (! $result){
				abort();
			}
			
			return $result;
		}
		
		public function get()
		{
			return $this->statement->fetchAll();
		}
	}