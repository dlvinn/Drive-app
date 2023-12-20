const selectAllCheckbox = document.getElementById('select-all');
selectAllCheckbox.addEventListener('change', () => {
    const checkboxes = document.querySelectorAll('input[name="row[]"]');
    console.log(checkboxes);
    checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
});

// delete file
const deleteButton = document.getElementById('deleteFile');
deleteButton.addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('input[name="row[]"]');
    const selectedFiles = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.closest('tr').querySelector('a').getAttribute('href'));
    if (selectedFiles.length === 0) {
        alert('Please select at least one file to delete.');
    } else {
        // Send an AJAX request to delete the selected files
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    getFiles();
                } else {
                    alert('An error occurred while deleting the selected files.');
                }
            }
        };
        var data = {
            "files": selectedFiles,
        };
        xhr.open('DELETE', 'controller/file-manager.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(data));
    }
});


// upload file
const form = document.getElementById('upload-form');
const fileInput = document.getElementById('file-input');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);
    formData.append('path', document.getElementById('directory').innerHTML);
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                getFiles();
            } else {
                alert('An error occurred while uploading the file.');
            }
        }
    };
    xhr.open('POST', 'controller/file-manager.php');
    xhr.send(formData);
});

// get files
function getFiles() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById('file-list').innerHTML = xhr.responseText;
                document.getElementById('directory').innerHTML = "";
            } else {
                alert('An error occurred while retrieving the file list.');
            }
        }
    };

    xhr.open('GET', 'controller/file-manager.php?dir=home');
    xhr.send();
}

// create folder
const newfolder = document.getElementById('createFolder');
newfolder.addEventListener('click', () => {
    const folderName = document.getElementById('foldername').value;
    const path = document.getElementById('directory').innerHTML;
    if (folderName.length > 1) {
        const formData = new FormData();
        formData.append('folder', folderName);
        formData.append('path', path);
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    getFiles();
                } else {
                    alert('An error occurred while creating the folder.');
                }
            }
        };
        xhr.open('POST', 'controller/file-manager.php');
        xhr.send(formData);
    }else{
        alert('Please enter the folder name.');
    }
});

let list = document.querySelector("#file-list");

// rename file
let renameBtn = document.getElementById('rename');
renameBtn.addEventListener('click', () => {
    // get the first selected file
    const checkboxes = document.querySelectorAll('input[name="row[]"]');
    const fileToRename = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value)[0].split('.');
    if(fileToRename.length == 1){
        document.getElementById('renametext').value = fileToRename[0];
        document.getElementById('extension').innerHTML = 'dir';
    }
    else if(fileToRename.length == 2){
        document.getElementById('renametext').value = fileToRename[0];
        document.getElementById('extension').innerHTML = '.' + fileToRename[1];
    }
});

let modalRenameBtn = document.getElementById('renameFile');
modalRenameBtn.addEventListener('click', () => {
    let text = document.getElementById('renametext').value;
    let extension = document.getElementById('extension').innerHTML;
    if(text.length > 1 && text.length <250){
        const checkboxes = document.querySelectorAll('input[name="row[]"]');
        selectedFiles = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.closest('tr').querySelector('a').getAttribute('href'));
        if (selectedFiles.length === 0 || selectedFiles.length > 1) {
            alert('Please select one file to rename.');
        } else {
            // Send an AJAX request to rename the selected file
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        getFiles();
                    } else {
                        alert('An error occurred while renaming the selected files.');
                    }
                }
            };
            if(extension == 'dir'){
                extension = '';
            }
            let renameTo = text + extension;
            var data = {
                "file": selectedFiles[0],
                "rename": renameTo,
            };
            xhr.open('PUT', 'controller/file-manager.php');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(data));
        }
    }
    else{
        alert('Please enter the file name.');
    }
});
    


// get directory

  list.addEventListener('click', event => {
    if (event.target.tagName === 'A') {
        if(event.target.getAttribute("class")==='directory-link'){
            event.preventDefault();
            let dirPath = event.target.getAttribute("href");
            fetchFiles(dirPath);
        }
      }
  });

  function fetchFiles(dirPath) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        var files = this.responseText; // parse the response as JSON
        // updateListView(files); // call a function to update the view with the list of files
        document.getElementById('file-list').innerHTML = files;
        let path = dirPath;
        let newPath = path.replace(/^home/, "");
        document.getElementById('directory').innerHTML = newPath;
      }
    };
    xhr.open("GET", "controller/file-manager.php?dir=" + dirPath, true); // specify the PHP script and the directory path as a query parameter
    xhr.send();
  }
