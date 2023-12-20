<?php
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name =  $_FILES["uploaded_file"]["name"];
    // $last_modified = date('Y-m-d H:i:s', filemtime($_FILES['uploaded_file']['tmp_name']));
    $last_modified = date('M j, Y g:i A', filemtime($_FILES['uploaded_file']['tmp_name']));
    $size = $_FILES["uploaded_file"]["size"];
    
    if ($size >= 1048576) { // 1 MB in bytes
        $size = number_format($size / 1048576, 1) . " MB";
    } else {
        $size = number_format($size / 1024, 0) . " KB";
    }

    $qry = "INSERT INTO drive VALUES('$id','$name','$last_modified', '$size')";
    if (mysqli_query($conn, $qry)) {
        echo '<script>alert("user registered succssesfully.");</script>';
        header('location: index.php');
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST["delete"])) {
    foreach ($_POST["deleteId"] as $deleteId) {
        $delete = "DELETE FROM drive WHERE id = $deleteId";
        mysqli_query($conn, $delete);
    }
}


/* 
if (isset($_POST['rename']) && isset($_POST['newName']) ) {
    $updatedName = $_POST['newName'];
    $theId = $POST['deleteId'];
    $qry = "UPDATE drivers SET names =". $updatedName .'WHERE id = '.$theId;
    mysqli_query($conn, $qry);

}  */





// if (isset($_POST['edit'])) {
//     $qry = $db->prepare('UPDATE drivers SET names = :names WHERE id = :id');
//     $qry->execute([
//         'id' => $_POST['id'],
//         'names' => $_POST['names'],
//     ]);
// } 






// if (isset($_POST['rename']) && isset($_POST['deleteId'])){
//   $new_name = $_POST['name'];
//   foreach ($_POST["deleteId"] as $deleteId) {
//     $rename = "UPDATE drive SET name = '$new_name' WHERE id = '$deleteId'";
//     mysqli_query($conn, $rename);
// }
// }






// if (isset($_POST["rename"])) {
//     $new_name = $_COOKIE['name'];
//     foreach ($_POST["deleteId"] as $deleteId) {
//         $rename = "UPDATE FROM drive SET name = $new_name   WHERE id = $deleteId";
//         mysqli_query($conn, $rename);
//     }
// }


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $new_name = $_POST['input_field'];
//     echo "The input value is: " . $input_value;
// }

// if(isset($_POST['items'])){
//     $items = $_POST['items'];
//     foreach($items as $item){
//         // process each item here
//         echo $item."<br>";
//     }
// }


// // Get the new file name and file ID from the form data
// $newFileName = $_POST['newFileName'];
// $fileId = $_POST['fileId'];

// // Update the file name in the database
// $stmt = $pdo->prepare('UPDATE drive SET name = $new_file_name WHERE id = $fileId');
// $result = $stmt->execute([$newFileName, $fileId]);

// // Check if the update was successful and return a response to the JavaScript code
// if ($result) {
//   echo json_encode(['success' => true]);
// } else {
//   echo json_encode(['success' => false]);
// }


// if (isset($_POST["delete"]) && isset($_POST["deleteId"])) {
//     foreach ($_POST["deleteId"] as $deleteId) {
//         $delete = "DELETE FROM drive WHERE id = $deleteId";
//         mysqli_query($conn, $delete);
//     }
// }



// // Check if the Rename button is clicked
// if(isset($_POST['rename_button'])) {
//     // Get the new file name from the form
//     $new_file_name = $_POST['new_file_name'];
    
//     // Get the selected files from the form
//     $selected_files = $_POST['selected_files'];
    
//     // Loop through each selected file and update its name in the database
//     foreach($selected_files as $file) {
//         $stmt = $db->prepare("UPDATE drive SET name = :new_file_name WHERE id = $deleteId");
//         $stmt->execute([
//             'new_file_name' => $new_file_name,
//             'old_file_name' => $file,
//         ]);
//     }
    
//     // Redirect to the file manager page
//     header("Location: file_manager.php");
//     exit();
// }