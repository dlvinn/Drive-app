// Get select all checkbox and individual checkboxes
var selectAll = document.getElementById("select-all");
var checkboxes = document.getElementsByName("deleteId[]");

// Add event listener to select all checkbox
selectAll.addEventListener("click", function () {
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = this.checked;
  }
});

// Add event listener to individual checkboxes to uncheck select all checkbox
for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener("click", function () {
    if (!this.checked) {
      selectAll.checked = false;
    }
  });
}






function DeleteFile() {
    let checkeds = document.querySelectorAll('input[type="checkbox"]:checked');
  
    let ids = [];
  
    for (let i = 0; i < checkeds.length; i++) {
      ids.push(checkeds[i].id);
    }
    ids.forEach((id) => {
      var formData = new FormData();
      formData.append("ids", id);
      formData.append("delete", "delete");
      $.ajax({
        url: "../../controller/file-manager.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data, status) {
          console.log(status);
          console.log(data);
        },
      });
    });
    location.reload();
  }
  

// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.querySelector("button");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close");

// // When the user clicks the button, open the modal
// function openModal() {
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// function closeModal() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// };

// var myModal = document.getElementById('myModal')
// var myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', function () {
//   myInput.focus()
// })

// function Createfolder() {
//   let folder = document.getElementById("FolderPath");
//   let folderName = folder.value;
//   let folderPath = new URL(document.location).searchParams;
//   folderPath = "http://localhost:3000/?" + folderPath;
//   var formData = new FormData();
//   formData.append("folderName", folderName);
//   formData.append("Folderpath", folderPath);
//   console.log(folderPath);
//   console.log(folderName);
//   let folderSize = 0;
//   let time = new Date("Wed, 27 July 2016 13:30:00");
//   formData.append("folder", folderName);
//   formData.append("size", folderSize);
//   formData.append("dates", time);
//   formData.append("upload", "upload");
//   $.ajax({
//     url: "../../controller/file-manager.php",
//     type: "POST",
//     data: formData,
//     processData: false,
//     contentType: false,
//     success: function (data, status) {
//       console.log(status);
//       console.log(data);
//     },
//   });

//   location.reload();
// }

// function DeleteFile() {
//   let checkeds = document.querySelectorAll('input[type="checkbox"]:checked');

//   let ids = [];

//   for (let i = 0; i < checkeds.length; i++) {
//     ids.push(checkeds[i].id);
//   }
//   ids.forEach((id) => {
//     var formData = new FormData();
//     formData.append("ids", id);
//     formData.append("delete", "delete");
//     $.ajax({
//       url: "../../controller/file-manager.php",
//       type: "POST",
//       data: formData,
//       processData: false,
//       contentType: false,
//       success: function (data, status) {
//         console.log(status);
//         console.log(data);
//       },
//     });
//   });
//   location.reload();
// }

// function showRenameForm() {
//     document.getElementById("renameForm").style.display = "block";
// }

// function hideRenameForm() {
//     document.getElementById("renameForm").style.display = "none";
// }

// function renameFile() {
//     // Get the new file name from the input field
//     var newFilename = document.getElementById("newFilename").value;

//     // Send an AJAX request to the server to update the file name
//     // ...

//     // Update the file name in the UI
//     document.getElementById("filename").textContent = newFilename;

//     // Hide the rename form
//     hideRenameForm();

//     // Show a success message
//     alert("File renamed successfully!");
// }

//{
  /* <div id="renameForm" style="display: none;">
    <input type="text" id="newFilename" placeholder="Enter new file name">
    <button onclick="renameFile()">Save</button>
    <button onclick="hideRenameForm()">Cancel</button>
</div> */
/* }
 function EditFolder() {
   let checked = document.querySelectorAll('input[name="editor"]')[0].value;
   let id = document.getElementsByName("editor")[0].id;
   let extenstion = document.getElementById("extenstion").value;
   console.log(extenstion);
   let fullname = checked + "." + extenstion;
   var formData = new FormData();
   formData.append("names", fullname);
   formData.append("id", id);

  formData.append("edit", "edit");
  $.ajax({
    url: "../../controller/file-manager.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (data, status) {
      console.log(status);
      console.log(data);
    },
  }); */

//   setTimeout(function () {
//     location.reload();
//   }, 1000);
// }



// // Get the form element
// const form = document.querySelector('#rename-form');

// // Add a submit event listener to the form
// form.addEventListener('submit', function(event) {
//   // Prevent the form from submitting normally
//   event.preventDefault();

//   // Get the form data
//   const formData = new FormData(form);

//   // Send the form data via AJAX
//   fetch('rename-file.php', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.json())
//   .then(data => {
//     // Handle the response from the PHP script
//     if (data.success) {
//       alert('File renamed successfully!');
//     } else {
//       alert('Failed to rename file.');
//     }
//   })
//   .catch(error => {
//     console.error(error);
//     alert('An error occurred while renaming the file.');
//   });
// });
