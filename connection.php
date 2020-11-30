<?php
class Connect 
{
	var $server = 'localhost';
	var $name = 'root';
	var $db = 'gp';
	var $password = '';
	
    private $con;

    function Connect()
    {
        $this->con = mysqli_connect($this->server,$this->name,$this->password,$this->db );
    }
    function excutequery($query)
    {
        return mysqli_query($this->con,$query);
    }
    function closecon()
    {
        mysqli_close($this->con);
    }
}
?>