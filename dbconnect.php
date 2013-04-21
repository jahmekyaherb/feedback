<?php
/**
 * This file contains the DB class used throughout this program
 * @author      Gwinyai Ntando
 * @link        mailto:support@jitsa.co.za
 * @version     $Id$
 * @copyright   2012 &copy  Gwinyai Ntando <mailto:support@jitsa.co.za>
 * @license     GNU Public Licence
 * @category    DB Class Library
 */

 require("./includes/adodb5/adodb.inc.php");
/**
 * class DB
*/
class DB extends ADOConnection
{
	/**
	 * database name
	 * @access private
	 */
	private $db_name;		
	/**
	 * datatase type
	 * @access private
	 */
	private $db_type;		
	/**
	 * host that contains the database
	 * @access private
	 */
	private $db_host;		
	/**
	 * user name to connect to db
	 * @access private
	 */
	private $db_user;		
	/**
	 * password to connect to db
	 * @access private
	 */
	private $db_pass;		
	/**
	 *connection variable
	 * @access public
	 */
	public $conn;			
	
	/**
	 * Constructor of DB Class
	 * @param  string db_host
	 * @param  string db_type
	 * @param  string db_name
	 * @param  string db_user
	 * @param  string db_pass 
	 * @return ADODBConnection conn
        @access public
	 */
	function __construct($db_host,$db_type,$db_name,$db_user,$db_pass){
		$this->setDBHost($db_host);
		$this->setDBType($db_type);
		$this->setDBName($db_name);
		$this->setDBUser($db_user);
		$this->setDBPassword($db_pass);
   
		$this->setDBConn();
		
	}//end constuctor
	
	/** 
	 * Set database host
	 * @param string  @return 
	 * @access public
	 */
  public function setDBHost($db_host) {
    $this->db_host = $db_host;
  } // end function
	
	/** 
	 * Get database host
	 * @return  string
	 * @access public
	 */
  public function getDBHost() {
    return $this->db_host;
  } // end function

	/** 
	 * Set database name
	 * @param string  @return 
	 * @access public
	 */
  public function setDBName($db_name) {
    $this->db_name = $db_name;
  } // end function 

  /** 
	 * Get database name
	 * @return  string
	 * @access public
	 */
  public function getDBName() {
    return $this->db_name;
  } // end function

  /** 
	 * Set database user
	 * @param string  @return 
	 * @access public
	 */
  public function setDBUser($db_user) {
  		$this->db_user = $db_user; 
  } // end function

	/** 
	 * Get database name
	 * @return  string
	 * @access public
	 */
  public function getDBUser() {
  		return $this->db_user; 
  } // end function

  /** 
	 * Set database password
	 * @param string  @return 
	 * @access public
	 */
  public function setDBPassword($db_pass) {
  		$this->db_pass = $db_pass; 
  } // end function

	/** 
	 * Get database password
	 * @return  string
	 * @access public
	 */
  public function getDBPassword() {
  		return $this->db_pass; 
  } // end function

  /** 
	 * Set database type
	 * @param string  @return 
	 * @access public
	 */
  public function setDBType($db_type) {
  		$this->db_type = $db_type; 
  } // end function

	/** 
	 * Get database type
	 * @return  string
	 * @access public
	 */
  public function getDBType() {
    return $this->db_type;
  } //  end function

	/** 
	 * Make the connection to the database
	 * @param   @return boolean, string
	 * @access private
	 */
	private function setDBConn()
	{
		@ $conn = &ADONewConnection($this->db_type);
		
		try{
			if ($conn->Pconnect($this->db_host,$this->db_user,$this->db_pass,$this->db_name)){
				$this->conn = &$conn;	
			
				return true;
			}
			else{
				 throw new Exception ('<i>Database server is down.</i>');
			}
		}
		catch(Exception $e){
			echo ('<b>Caught an exception: </b>' . $e->getMessage());
		}
		
	}//end function

	/** 
	 * Execute sql query
	 * @param string  @return object
	 * @access public
	 */
	public function execSQL($sql)
	{
		$rs = $this->conn->Execute($sql) or DIE($this->conn->ErrorMsg()." ".$sql);
		return $rs;
	}//end function
	
	/** 
	 * Close connection to database
	 * @return boolean
	 * @access public
	 */
	public function terminate() {
    $this->conn->Close();
    return true;
  } // end function

}//end class
?>
