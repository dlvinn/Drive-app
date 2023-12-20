<?php

require 'config/config.php';
require 'controller/file-manager.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Drive</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/main.css">
    <script src="asset/actions.js" defer></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
</head>

<body class="">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <nav class="navbar navbar-light bg-secondary">
            <div class="container-fluid">
                <span class="navbar-brand text-light mb-0 h1">My Drive</span>
                <div class="" role="group" aria-label="Basic example">
                    <button href="controller/file-manager.php" type="submit"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal"  name="delete">Delete</button>
                    <button type="button" class="btn btn-light " data-bs-toggle="modal" data-bs-target="#rename" name='rename' id="rename-btn">Rename</button>
                    
                                       <!-- <button type="button" name="" class="btn btn-light">New Folder</button> -->
                    <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#NewFolderModal"   >New Folder</button>

                </div>
            </div>
        </nav>

        <!-- <div>
    <p>File name: <span id="filename">file.txt</span></p>
    <button onclick="showRenameForm()">Rename</button>
</div> -->


        <div class="p-3">
            <div class="mb-3 mt-2">
                <a href="">Home</a>
            </div>
            <div class="input-group">
                <input class="form-control form-control-sm h-100" id="formFileSm" type="file" name="uploaded_file">
                <button type="submit" class="btn btn-primary h-0  " name="submit">Upload</button>
            </div>
            <table class="table">
                <tr>
                    <th scope="col"><input type="checkbox" id="select-all" name="deleteId"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Modified</th>
                    <th scope="col">Size</th>
                </tr>
                <?php
                $qry = "SELECT * FROM `drive`";
                $run = $conn->query($qry);
                if ($run->num_rows > 0) {
                    while ($row = $run->fetch_assoc()) {
                ?>
                        <tr>
                            <td><input type="checkbox" class="mycheckbox" name="deleteId[]" value="<?php echo $row['id']; ?>"></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['last_modified'] ?></td>
                            <td><?php echo $row['size'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
    </form>
    </table>
    </div>

    <form  id="renameForm" enctype="multipart/form-data" action="controller/submitRename.php" method="post">
                    
                    <div class="modal" tabindex="-1" id="rename">
                    <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Rename File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="rename-body">
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit"  class="btn btn-primary" name ="rename-btn">Rename</button>
                      <div id="renaming-result"></div>
                      </div>
                    </div>
                  </div>
                    </div>
                </form>    




    <!-- new folder modal -->
  <div class="modal fade" id="NewFolderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New <i class="fas fa-folder    "></i> files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" id="FolderPath" type="text" placeholder="New folder name" aria-label="default input example">
        </div>
        <div class="modal-footer">
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary" onclick="Createfolder()" >Create Folder </button>
        </div>
      </div>
    </div>
  </div>




<!-- renmae modal -->

  </form>

  <div id="renaming-result"></div>



    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Open Modal
    </button> -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deleting File</h4>
                    <button type="submit" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure about deleting selected file ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- 
    <button onclick="openModal()">Open Modal</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Modal Header</h2>
            <p>Modal body text goes here.</p>
        </div>
    </div>
 -->


    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->


<!-- <form id="rename-form">
  <input type="text" name="newFileName" placeholder="Enter new file name...">
  <input type="hidden" name="fileId" value="1">
  <button type="submit">Rename</button>
</form>  -->
    <!-- 

<form method="POST">
  <label for="name">Enter your name:</label>
  <input type="text" name="name" id="name">
  <button type="submit">Submit</button>
</form> -->

<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script type="text/javascript" src="asset/js/javascript.js"></script>


</body>


</html>