async function userDelete(idUser) {
    if (idUser == "" || idUser == 0) {
      var message = '<div class="alert alert-danger alert-dismissible fade show" id="msg-alert">' +
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                      '<strong>Error!</strong> Pick one item!' +
                    '</div>';
  
      document.getElementById("alert").innerHTML = message;
  
      $("#msg-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#msg-alert").slideUp(500);
      });
  
      return;
    }
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
    
        var message = '<div class="alert alert-success alert-dismissible fade show" id="msg-alert">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        'Usuário excluído com <strong>sucesso</strong>!' +
                      '</div>';
  
        document.getElementById("alert").innerHTML = message;
  
        $("#msg-alert").fadeTo(2000, 500).slideUp(500, function () {
          $("#msg-alert").slideUp(500);
          location.reload(); 
        });
      }
    };
  
    xmlhttp.open("GET", "excluido-user.php?excluir=" + idUser, true);
    xmlhttp.send();
  
  }
async function userRegistered() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
    
        var message = '<div class="alert alert-success alert-dismissible fade show" id="msg-alert">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        'Usuário cadastrado com <strong>sucesso</strong>!' +
                      '</div>';

        document.getElementById("alert").innerHTML = message;

        $("#msg-alert").fadeTo(2000, 500).slideUp(500, function () {
          $("#msg-alert").slideUp(500);
          location.reload(); 
        });
      }
    };
    var name     = document.getElementById("name").value;
    var email     = document.getElementById("email").value;
    var date     = document.getElementById("date").value;
    var password     = document.getElementById("password").value;

    xmlhttp.open("GET", "salvar-usuario.php?acao=cadastrar&name=" + name + "&email=" + email + "&date=" + date + "&password=" + password, true);
    xmlhttp.send();
}

async function userList(filtro = ""){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("listaUser").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "listauser.php?filtro=" + filtro, true);
  xmlhttp.send();
}

async function userFilter(){
  var filtro     = document.getElementById("userSearch").value;

  userList(filtro);

}