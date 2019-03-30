<?php
    class Conn {
         
         var $servername = "localhost";
         var $username = "root";
         var $password = "";   
         var $conn = null; 

         function __construct($servername,$username,$password){
                $this->servername = $servername;
                $this->username = $username;
                $this->password = $password;
         }

         function connect_to_db(){
                try {
                        $this->conn = new PDO("mysql:host=$this->servername;dbname=greyroutes", $this->username, $this->password);
                        // set the PDO error mode to exception
                        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     }
                catch(PDOException $e)
                    {
                          echo "\nConnection issue\n";  
                          echo $e; 
                          die(); 
                    }
                    return $this->conn;
         }

         function close_db_connection(){
                $this->conn = null;
         }

    }
?>