function sendData(form, page, redirection) {
    var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
         }
    }
  

    // Liez l'objet FormData et l'élément form
    var formData = new FormData(form);

    // Définissez ce qui se passe si la soumission s'est opérée avec succès
    xhr.addEventListener("load", function(event) {
      console.log(event.target.responseText);
      $msg=JSON.parse(event.target.responseText);
      if (!$msg.success) {
        alert($msg['msg']);
      }
      else{
        window.location.href="redirection";
      }
    });

    // // Definissez ce qui se passe en cas d'erreur
    // xhr.addEventListener("error", function(event) {
    //   alert('Oups! Quelque chose s\'est mal passé.');
    // });


    // Configurez la requête
    xhr.open("POST", page);

    // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
    xhr.send(formData);
  }