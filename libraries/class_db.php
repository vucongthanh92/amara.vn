<?php 


class connect_db{
	protected $property = array(
        'server'    	=> 'localhost',
        'db_user'    	=> 'amara_admin',
        'db_pass'    	=> 'xDxcu03t',
        'db_name'    	=> 'amara_new',
    );
	protected $conn = "";
	protected $result = "";
	
	public function setmysql($info)
    {
        foreach($this->property as $k => $v)
        {
           $this->property[$k]=$info[$k];
        }
    }
	
	public function connect()
    {
        $this->conn = @mysql_pconnect($this->property['server'],$this->property['db_user'],$this->property['db_pass']) or die("can not connect to server. may be server busy");
		@mysql_select_db($this->property['db_name'],$this->conn) or die("can not select database now");
		mysql_query ("SET NAMES utf8");
    }
	
	public function disconnect()
	{
		if($this->conn)
		{
			//mysql_close($this->conn);
		}
	}
	
	public function query($sql)
	{
		$this->result = mysql_query($sql) or die (mysql_error());
	}
}
 ?>