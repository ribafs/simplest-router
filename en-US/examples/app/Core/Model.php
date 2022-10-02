<?php
declare(strict_types = 1);
namespace Core;

use Core\Connection;

class Model extends Connection
{ 
	public $table;
	
    public function __construct($table)
    {
        $this->table = $table;
        try {
        	$pdo = Connection::getInstance();
            $this->pdo = $pdo;
        	Connection::setCharsetEncoding();          
        } catch (Exception $e) {
	        print $e->getMessage();          
        }
    }

	// Number of fields in the current table
	public function numFields(){
		$sql = "SELECT * FROM $this->table LIMIT 1";
		$sth = $this->pdo->query($sql);		
		return $sth->columnCount();
	}	

	// Field name by number $x
	public function fieldName($x){
		$sql = "SELECT * FROM $this->table LIMIT 1";
		$sth = $this->pdo->query($sql);
		$meta = $sth->getColumnMeta($x);
		return $meta['name'];
	}
	
    public function numRows($sql=null){ // Example: $sql = "SELECT * FROM $this->table";
        if(is_null($sql)) {
            $sql = 'SELECT * FROM '.$this->table;
        }
        
        $sth = $this->pdo->query($sql);
        return $sth->rowCount();
    }	
	
	public function getTables(){
		try {
		  if($sgbd=='mysql'){
 		    $sql="SHOW TABLES";
		  }elseif($sgbd=='pgsql'){
			$sql="SELECT relname FROM pg_class WHERE relname !~ '^(pg_|sql_)' AND relkind = 'r';";
		  }elseif($sgbd=='sqlite'){
            $sql='SELECT name FROM sqlite_master WHERE type = "table"';
          }
		  $tableList = array();		  
		  $res = $pdo->prepare($sql);
		  $res->execute();
		  while($cRow = $res->fetch())
		  {
			$tableList[] = $cRow[0];
		  }
		  return $tableList;// array
		}catch (PDOException $p){
			print $p->getMessage();
			exit;
		}
	}
}
