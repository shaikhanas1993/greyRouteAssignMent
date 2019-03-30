<?php

   class Search{

        var $db;
        public function __construct($db){
               $this->db = $db;
        }

        function getAll(){
           $query = $this->db->prepare('SELECT * FROM dummy');
           $query->execute();
           $result = $query->fetchAll(); 
           return $result; 
        }

        function filer_func($data){
             $sql = array();
             
             if(!empty($data['min-birthrate']) && !empty($data['max-birthrate']))
             {
                $sql[] = "birthsPerWomen BETWEEN {$data['min-birthrate']} AND {$data['max-birthrate']}";
             }

             if(!empty($data['max-population']) &&  !empty($data['min-population']))
             {
                $sql[] = "population BETWEEN {$data['min-population']} AND {$data['max-population']}";
             }

             if(!empty($data['height']))
             {
                 if(!empty($data['height_filter']) && $data['height_filter'] =='greater Than')
                 {
                    $sql[] = "height > {$data['height']}";    
                 }else if(!empty($data['height_filter']) && $data['height_filter'] =='less Than'){
                    $sql[] = "height < {$data['height']}";    
                 }else{
                    $sql[] = "height = {$data['height']}";
                 }
             }

             if(!empty($data['area']))
             {
                 if(!empty($data['area_filter']) && $data['area_filter'] =='greater Than')
                 {
                    $sql[] = "area > {$data['area']}";    
                 }else if(!empty($data['area_filter']) && $data['area_filter'] =='less Than'){
                    $sql[] = "area < {$data['area']}";    
                 }else{
                    $sql[] = "area = {$data['area']}";
                 }
             }

             $query = "SELECT * FROM dummy";

             if (!empty($sql)) {
                $query .= ' WHERE ' . implode(' AND ', $sql);
             }

             echo "<pre>";
             print_r($query);
             echo "</pre>";
           $squery = $this->db->prepare($query);
           $squery->execute();
           $result = $squery->fetchAll(); 
           return $result; 
        }

   }
?>