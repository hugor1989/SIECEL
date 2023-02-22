<?php
class dbconn {
	public $dblocal;
	public function __construct()
	{

	}
	public function initDBO()
	{
        $user = "siecelppr_pprpar";  
        $pwd = "wB8G[NdmsFj;";  
        $dbname = "siecelppr_ppr";  
		try {
			$this->dblocal = new PDO("mysql:host=localhost;dbname=".$dbname.";charset=UTF8",$user,$pwd,array(PDO::ATTR_PERSISTENT => true));
			$this->dblocal->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			die("Can't connect database");
		}
		
	}
	
}