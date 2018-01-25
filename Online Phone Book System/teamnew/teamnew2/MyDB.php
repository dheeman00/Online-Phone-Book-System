<?php 

	class MyDB
	{
		private $database;
		
		/* make a connection to MySQL through PDO 
		*/
		public function __construct($dbName)
		{
			$config = parse_ini_file('../../dbconf.ini'); 
			$hostname = $config['hostname'];
			
			if (!isset($this->database))
			{
				try 
				{
					$this->database = new PDO("mysql:host=$hostname;dbname=$dbName", $config['username'], $config['password'],
							array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
				}
				catch(PDOException $e)
				{
					$this->errorMsg("Could not connection to database: " . $e->getMessage());
				}
			}
		}
		
		/* 
		 *@param $query: The query string for updating the tables using statements 
				such as UPDATE, INSERT, DELETE and etc.
		 *@return : number of the rows effected
		*/
		public function updateQuery($query)
		{
			try
			{
				$this->database->query($query);
			}catch(PDOException $e)
			{
				$this->errorMsg("Could not execute query: " . $e->getMessage());
			}	
		}
		
		/* 
		 *@param $query: The query string for selecting data from the tables using statements 
				such as SELECT and SHOW
		 *@return : array with retrieved rows 
		*/
		public function selectQuery($query)
		{
			$results = Array();
			try
			{
				$statement = $this->database->query($query);	
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				
				$i = 0;
				while ($results[$i++] = $statement->fetch()) {}
			}catch(PDOException $e)
			{
				$this->errorMsg("Could not execute query: " . $e->getMessage());
			}
			
			return $results;
		}
		
		public function closeDB()
		{
			$database = null;
		}
		
		public function errorMsg($str)
		{
			 die($str."</body></html>");  
		}
	}
	
 	function condition($w_str, $f, $cond)
	{   $f = trim($f);
		if (empty($f))
			return $w_str;
			
		if (!empty($w_str))
			$w_str = $w_str." and ".$cond;
		else
			 $w_str = $cond;
	   
		return $w_str;         
	} 
?>