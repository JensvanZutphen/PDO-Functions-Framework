<?php
function getConnection($host,$username,$password,$table,$database){
    $connection = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    return $connection;
}
function getAll($connection,$table){
    $sql = "SELECT * FROM $table";
    $statement = $connection->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function search($connection,$table,$search){
    $sql = "SELECT * FROM $table WHERE name LIKE '%$search%'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function insert($connection,$table,$name){
    $sql = "INSERT INTO $table (name) VALUES (:name)";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name',$name);
    $statement->execute();
}
function update($connection,$table,$id,$name){
    $sql = "UPDATE $table SET name = :name WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':id',$id);
    $statement->execute();
}
function delete($connection,$table,$id){
    $sql = "DELETE FROM $table WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
}
?>