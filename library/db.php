<?php
try {
    $db =  new PDO("mysql:host=localhost;dbname=sub_category","root","");
} catch (PDOException $e){
    echo $e->getMessage();
}