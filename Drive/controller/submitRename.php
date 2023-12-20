<?php
include '../config/config.php';

if(isset($_POST['newName']) && isset($_POST['renamingId']) && isset($_POST['extension'])){

    $getName = $db->prepare("SELECT name FROM `index` WHERE id = ? ");
 
    $getName ->bindParam(1,$_POST['renamingId']);
    $getName->execute();
    $name = $getName->fetch(PDO::FETCH_ASSOC);

    $nameConversionToString =  implode(" ", $name);
   if(is_dir("../".$nameConversionToString)){
    
    $updateName = $db->prepare("UPDATE `drive` 
    SET name = ? 
    WHERE id = ?");
    $updatedName = $_POST['newName'];
    $updateName->bindParam(1 , $updatedName);
    $updateName->bindParam(2 , $_POST['renamingId']);
    $updateName->execute();
    echo 'successfully updated';
   
   }else{
      $updateName = $db->prepare("UPDATE `drive` 
      SET name = ? 
      WHERE id = ?");
      $updatedName = $_POST['newName']. ".".$_POST['extension'];
      $updateName->bindParam(1 , $updatedName);
      $updateName->bindParam(2 , $_POST['renamingId']);
      $updateName->execute();
   }
   
 

    

 }else{
    echo 'something is wrong';
    var_dump($_POST);
 }
 ?>