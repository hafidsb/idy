<?php

namespace Idy\Idea\Controllers\Web;

use PDO;

class MySQLPdo{

    private $host;
    private $name;
    private $user;
    private $password;
    
    function __construct()
    {
        $this->host = getenv("IDEA_DB_HOST");
        $this->name = getenv("IDEA_DB_NAME");
        $this->user = getenv("IDEA_DB_USERNAME");
        $this->password = getenv("IDEA_DB_PASSWORD");
    }

    function build()
    {
        try {
            $dsn = "mysql:dbname=". $this->name .";host=".$this->host."";
            $databasehandler = new PDO($dsn, $this->user, $this->password);
            return $databasehandler;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
            // echo 'Connection failed: ' . $e->getMessage();
        }
    }
}