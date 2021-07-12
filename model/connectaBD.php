<?php

    function connectaBD(){
	        try{
	            $connection = new PDO('mysql: host=localhost;dbname=tdiwd1;port=3306;charset=utf8mb4;', 'tdiw-d1', 'Letzh21y');
	        }
	        catch(PDOException $e){
	            echo "Connection failed:" . $e->getMessage();
	            die;
	        }
        return ($connection);
    }
?>