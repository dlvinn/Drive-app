document.querySelector('#rename-btn').onclick = () => {
  

  
    var checkBoxes = document.getElementsByClassName("mycheckbox");
    var myId;
      function checking(){
      for(let i = 0; i < checkBoxes.length; i++){
      if(checkBoxes[i].checked){
        myId = checkBoxes[i].value;
     
      }
    }
    }
    checking();
    var data = {
        id: myId
    }
   
    // ----------------------------
    fetch(
        'controller/rename.php',
        { 
            method: 'POST',
            
            
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
            
        }
    )
    .then(res => res.text())
    .then(res => {
        //hide_animated_loader(); 
        document.querySelector("#rename-body").innerHTML = res
    });

}

    document.querySelector('#renameForm').onsubmit = (e) => {
    e.preventDefault();

    var formData = new FormData(document.querySelector('#renameForm'));
   
   
    // ----------------------------
    fetch(
        'controller/submitRename.php',
        { 
            method: 'POST',
            
            
            
            body: formData
           
        }
    )
    .then(res => res.text())
    .then(res => {
        
        document.querySelector("#renaming-result").innerHTML = res
    });

}