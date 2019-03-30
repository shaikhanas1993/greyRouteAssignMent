<?php 

/*
 *       Starting point of main thread.
*/
include 'Conn.php';
include 'Search.php';
include 'Dumper.php';

class Main{
    var $search = null;
    var $dumper = null;    
    var $db = null;

    public function __construct(){
  
        //Connecting to db by creating a singleton
        $conn = new Conn("localhost","root","");
        $this->db = $conn->connect_to_db();
        
        //Creating an instance of search so that we can call functions related to search
        $this->search = new Search($this->db);
        //Creating an instance of dumper so that we can dump data into mysql
        $this->dumper = new Dumper($this->db);
    }

    function dump_data(){
        $this->dumper->dump_data();
    }

    function render_cities(){
       $result = $this->search->getAll();
       return $result;
    }

    function render_filter_data($data){
        $result = $this->search->filer_func($data);
        return $result;
    }

    function searchFilter($min_population = 0,$max_population = 0,$min_birthrate = 0,$max_birthrate = 0){

    }

}

?>