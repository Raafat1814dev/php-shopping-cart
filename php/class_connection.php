<?php

/**
 * class to connect to the database 
 */
class Connection
{

    private $server = "mysql:dbname=productdb;host=localhost;charset=UTF8";
    private $user = "root";
    private $pass = "cimdata";

    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $pdo;

    /**
     * open the connection to the database
     *
     * @return con
     */
    public function openConnection()
    {
        try {
            $this->pdo = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    /**
     * close the connection to the database
     *
     * @return con=null
     */
    public function closeConnection()
    {
        $this->pdo = null;
    }


    // #####################################
    // #####################################
    

}
