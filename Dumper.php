<?php 


//The role of the class it to dump from excel to db
class Dumper{
    var $db;
    function __construct($db){
        $this->db = $db;
    }

    public function dump_data(){
        //check if data is already dumped within the db.
        $is_data_already_dump = $this->checkRowExist();
        if(!$is_data_already_dump){
            $this->read_excel_file();
        }
    }

    function checkRowExist(){
            $sql = "SELECT count(*) FROM dummy LIMIT 5"; 
            $result = $this->db->prepare($sql); 
            $result->execute(); 
            $number_of_rows = $result->fetchColumn();
            if($number_of_rows>0){
                return true;
            } 
            return false;
    }

    function read_excel_file(){
        require('nuovo/spreadsheet-reader/php-excel-reader/excel_reader2.php');
        require('nuovo/spreadsheet-reader/SpreadsheetReader.php');
        $Reader = new SpreadsheetReader('Cities_List.xlsx');
        
        try {
            
            $colum_arr = array('cityName','area','population','height','density','birthsPerWomen','growthRate');
            $colums =  implode ( ",", $colum_arr );
            
            //Beginning Transaction
            $this->db->beginTransaction();
            
            $i = 0;
            foreach ($Reader as $Row)
            {
                //skip the first record
                if($i == 0){
                    $i++;
                    continue;
                }

                //Patch code since we get height sometimes as string instead of float or int
                $data = array();
                foreach($Row as $key => $value){
                   if($key == 3)
                   {
                        array_push($data,(float)$value);
                   }
                   else
                   {
                        array_push($data,$value);
                   }
                   
                }

                $values = "'".implode( "','", $data ). "'";
                $this->db->exec("INSERT INTO dummy ({$colums}) VALUES ({$values})");
                $i++;
            }
            $this->db->commit();
        }
        catch(PDOException $e){
             $this->db->rollback();
             throw $e;
        }

    }


}


?>