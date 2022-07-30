let miForm=document.getElementById('registroUser');
searchAll();
//Se agrega evento listener al formulario
miForm.addEventListener("submit", function (e) {
  e.preventDefault();
  let misDatos=new FormData(miForm);
  //let usern=document.getElementById('user');
  //console.log(misDatos.get("useradd"));
  //console.log(misDatos.get("passwd"));
fetch("acciones/Agregar.php", {
  method: "POST",
  body: misDatos
})
  .then((resp) => resp.json())
  .then((data) => {
    //alert(data);
    if(data=='error'){
      Mensaje='Error';
      bodyM = "Favor de llenar todos los campos";
      icono='error'
    }else{
      Mensaje = "Felicidades";
      bodyM = data;
      icono = "success";
      searchAll();
    }
    Swal.fire(Mensaje, bodyM, icono);
    miForm.reset()
  })
  .catch((error) => {
    console.log("Algo salió mal..." + error);
  });

});
//Se crea función de buscarTodo->searchAll
function searchAll(){
  fetch("acciones/Buscar.php")
    .then((response) => response.text())
    .then((mydata) => {
      //console.log(mydata);
      document.querySelector(".tbody").innerHTML = mydata
    })
    .catch((error) => {
      console.log("Algo salió mal..." + error);
    });
}
//Se define la función que se empleará para eliminar registros
function deleteReg(id){
  Swal.fire({
    title: "¿Estas seguro que deseas eliminar el registro?",
    text: "No podrá revertir este proceso",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "¡Si, eliminarlo!",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("acciones/Eliminar.php", {
        method: "POST",
        body: id
      })
        .then((response) => response.json())
        .then((data) => {
          if(data=='success'){
            Swal.fire("¡Felicidades!","<strong>Tu registro ha sido eliminado...</strong>", "success");
            searchAll();
          }
        })
        .catch((error) => {
          console.log("Algo salio mal eliminar" + error);
        });
      }
  });
}

//Se define la función que se usará para actualizar un registro
function searchRegId(id){
  fetch("acciones/buscarId.php", {
    method: "POST",
    body: id,
  })
    .then((resp) => resp.json())
    .then((resp) => {
      /*for(let i in resp){
      userUpdate.value=resp[i].user
      passUpdate.value=resp[i].pass
   }*/
      iduser.value = resp.iduser;
      userUpdate.value = resp.user;
      passUpdate.value = resp.passwd;
      //console.log(resp);
    })
    .catch((error) => {
      console.log(error);
    });
}
function saveChange(){
  let frmUpdate=document.getElementById('updateFrm');
  frmUpdate.addEventListener("submit", function (event) {
     event.preventDefault();
    let changes = new FormData(frmUpdate);
    fetch("acciones/Actualizar.php",{
      method:'POST',
      body:changes
    })
    .then(resp=>resp.json())
    .then(datos=>{
      Swal.fire("Felicidades", datos, "success");
      frmUpdate.reset();
      searchAll()
      //console.log(datos)
    })
    .catch(error=>{
      console.log(error)
    })
  });
}

