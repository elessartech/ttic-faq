<?php
class Database
{
    /**
	 * Connection to db mysql
	 * @param $host 
	 * @param $dbname 
	 * @param $user 
	 * @param $pass
	 */
    public function connect($host, $dbname, $user, $pass) 
    {
        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass);
        }   
        catch(PDOException $e) {
            die('Database error: '.$e->getMessage().'<br/>');
        }
        return $db;
    }
}
?>