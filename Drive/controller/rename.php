<?php
include '../config/config.php';



$data = file_get_contents('php://input');
$myData = json_decode($data);
  
        $getName = $db->prepare("SELECT name FROM `index` WHERE id = ? ");
        //echo $lastSelectedId;
        $getName ->bindParam(1,$myData->id);
        $getName->execute();
        $name = $getName->fetch(PDO::FETCH_ASSOC);
        $nameConversionToString =  implode(" ", $name);
        $file = pathinfo($nameConversionToString);
        $ext = $file['extension'];
        $fileName = $file['filename'];
        //echo $ext;
        echo '
              <div class="input-group mb-3">
             
              <input type="hidden" id="userID" name="renamingId" value="'.$myData->id.'">
              <input type="hidden" id="fileExtension" name="extension" value="'.$ext.'">
              <input type="text" class="form-control" value ="'.$fileName.'" placeholder="Rename" aria-label="Recipient'.'s username" aria-describedby="basic-addon2" name ="newName">
              <span class="input-group-text" id="basic-addon2" >.'.$ext.'</span>
              </div>
         ';
  




?>