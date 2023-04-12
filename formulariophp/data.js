async function userDelete(idUser) {
  if (idUser == "" || idUser == 0) {
    var message =
      '<div class="alert alert-danger alert-dismissible fade show" id="msg-alert">' +
      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
      "<strong>Error!</strong> Pick one item!" +
      "</div>";

    document.getElementById("alert").innerHTML = message;

    $("#msg-alert")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#msg-alert").slideUp(500);
      });

    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var message =
        '<div class="alert alert-success alert-dismissible fade show" id="msg-alert">' +
        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        "Usuário excluído com <strong>sucesso</strong>!" +
        "</div>";

      document.getElementById("alert").innerHTML = message;

      $("#msg-alert")
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $("#msg-alert").slideUp(500);
          location.reload();
        });
    }
  };

  xmlhttp.open("GET", "excluido-user.php?excluir=" + idUser, true);
  xmlhttp.send();
}
async function userEdit(idUser) {
  if (idUser == "" || idUser == 0) {
    var message =
      '<div class="alert alert-danger alert-dismissible fade show" id="msg-alert">' +
      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
      "<strong>Error!</strong> Pick one item!" +
      "</div>";

    document.getElementById("alert").innerHTML = message;

    $("#msg-alert")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#msg-alert").slideUp(500);
      });

    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var retorno = JSON.parse(this.responseText); //this responseText tem os valores da coluna do SQL
      console.log(retorno);

      if (retorno) {
        document.getElementById("idUser").value = retorno.id;
        document.getElementById("name").value = retorno.nome;
        document.getElementById("email").value = retorno.email;
        document.getElementById("date").value = retorno.data_cadastro;
        document.getElementById("date").setAttribute("disabled", true);
        document.getElementById("divPassword").setAttribute("hidden", true);
        document.getElementById("titleRegister").setAttribute("hidden", true);
        document.getElementById("titleView").setAttribute("hidden", true);
        document.getElementById("titleEdit").removeAttribute("hidden");
        document.getElementById("password").removeAttribute("required");
        document.getElementById("hiddenRowID").setAttribute("hidden", true);
        document.getElementById("alert").setAttribute("hidden", true);
        $("#exampleModal").modal("toggle");
      }
    }
  };

  xmlhttp.open("GET", "edit-user.php?edit=" + idUser, true);
  xmlhttp.send();
  
}async function userView(idUser) {
  if (idUser == "" || idUser == 0) {
    var message =
      '<div class="alert alert-danger alert-dismissible fade show" id="msg-alert">' +
      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
      "<strong>Error!</strong> Pick one item!" +
      "</div>";

    document.getElementById("alert").innerHTML = message;

    $("#msg-alert")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#msg-alert").slideUp(500);
      });

    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var retorno = JSON.parse(this.responseText); //this responseText tem os valores da coluna do SQL
      console.log(retorno);

      if (retorno) {
        document.getElementById("idUser").value = retorno.id;
        document.getElementById("name").value = retorno.nome;
        document.getElementById("email").value = retorno.email;
        document.getElementById("date").value = retorno.data_cadastro;
        document.getElementById("name").setAttribute("disabled", true);
        document.getElementById("email").setAttribute("disabled", true);
        document.getElementById("date").setAttribute("disabled", true);
        document.getElementById("idUser").setAttribute("disabled", true);
        document.getElementById("divPassword").setAttribute("hidden", true);
        document.getElementById("titleRegister").setAttribute("hidden", true);
        document.getElementById("titleEdit").setAttribute("hidden", true);
        document.getElementById("titleView").removeAttribute("hidden");
        document.getElementById("hiddenRowID").removeAttribute("hidden");
        document.getElementById("password").removeAttribute("required");
        document.getElementById("alert").setAttribute("hidden", true);
        $("#exampleModal").modal("toggle");
      }
    }
  };

  xmlhttp.open("GET", "view-user.php?view=" + idUser, true);
  xmlhttp.send();
}


async function userRegistered() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        var message =
          '<div class="alert alert-success alert-dismissible fade show" id="msg-alert">' +
          '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
          "Usuário cadastrado com <strong>sucesso</strong>!" +
          "</div>";

        document.getElementById("alert").innerHTML = message;

        $("#msg-alert")
          .fadeTo(2000, 500)
          .slideUp(500, function () {
            $("#msg-alert").slideUp(500);
            location.reload();
          });
      }
      if (this.status == 400) {
        var retorno = JSON.parse(this.responseText);
        var message =
          '<div class="alert alert-warning alert-dismissible fade show" id="msg-alert">' +
          '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
          retorno.message +
          "</div>";

        document.getElementById("alert").innerHTML = message;

        $("#msg-alert")
          .fadeTo(2000, 500)
          .slideUp(500, function () {
            $("#msg-alert").slideUp(500);
          });
      }
    }
  };
  var idUser = document.getElementById("idUser").value;
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var date = document.getElementById("date").value;
  var password = document.getElementById("password").value;

  xmlhttp.open(
    "GET",
    "salvar-usuario.php?acao=cadastrar" +
     "&idUser=" +
      idUser +
     "&name=" +
      name +
      "&email=" +
      email +
      "&date=" +
      date +
      "&password=" +
      password,
    true
  );
  xmlhttp.send();
}

async function userList(filtro = "") {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("listaUser").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "listauser.php?filtro=" + filtro, true);
  xmlhttp.send();
}

async function userFilter() {
  var filtro = document.getElementById("userSearch").value;

  userList(filtro);
}
async function userFilterClear() {
  document.getElementById("userSearch").value = "";
  userList();
}

function cadastroUser(){
  document.getElementById("idUser").value = "";
  document.getElementById("name").value = "";
  document.getElementById("email").value = "";
  document.getElementById("date").value = "";
  document.getElementById("password").value = "";
  document.getElementById("date").removeAttribute("disabled");
  document.getElementById("name").removeAttribute("disabled");
  document.getElementById("email").removeAttribute("disabled");
  document.getElementById("hiddenRowID").setAttribute("hidden", true);
  document.getElementById("divPassword").removeAttribute("hidden");
  document.getElementById("password").setAttribute("required", true);
  document.getElementById("titleEdit").setAttribute("hidden", true);
  document.getElementById("titleView").setAttribute("hidden", true);
  document.getElementById("titleRegister").removeAttribute("hidden");
  $("#exampleModal").modal("toggle");
}