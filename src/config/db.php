<?php
    class db {

    function connect($db, $collecction){
        //Connecting to MongoDB
        try {
            $connection = new MongoClient("mongodb://127.0.0.1");
            $database = $connection->$db;       
            $collection = $database->$collecction; 
            
        }catch (MongoDBDriverExceptionException $e) {
            echo $e->getMessage();
            echo nl2br("n");
        }
        
        return $collection ;
    }


}
