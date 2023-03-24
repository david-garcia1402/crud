function itemLoad(idCategory) {
  document.getElementById("cbMaterial").value    = 0;
  document.getElementById("cbMaterial").disabled = idCategory == "" || idCategory == "0" || idCategory == "1";

  if (idCategory == "") {
    var cbEmpty = '<select class="form-control" id="cbItem" name="cbItem">' +
                    '<option value="">No category chosen</option>' +
                  '</select>';
    document.getElementById("itemData").innerHTML = cbEmpty;
    return;
  }
  var cbLoading = '<select class="form-control" id="cbItem" name="cbItem">' +
                    '<option value="">Loading data ...</option>' +
                  '</select>';
  document.getElementById("itemData").innerHTML = cbLoading;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("itemData").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "getItem.php?idCategory=" + idCategory, true);
  xmlhttp.send();
}

async function itemAdd() {
  var idCategory = parseInt(document.getElementById("cbCategory").value);
  var idItem     = document.getElementById("cbItem").value;
  var Item       = document.getElementById("cbItem").options[document.getElementById("cbItem").selectedIndex].text;
  var quantity   = document.getElementById("edQuantity").value;
  var idType     = document.getElementById("cbMaterial").value;
  var type       = document.getElementById("cbMaterial").options[document.getElementById("cbMaterial").selectedIndex].text;
  var points     = document.getElementById("edPoints").value;

  if (idType == 0) {
    type = "";
  }

  if (idItem == "" || idItem == 0) {
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
      var itemsList        = [];
      var materialsList    = [];
      var pointsArmorers   = 0;
      var pointsArtificers = 0;

      if (localStorage.itemsList) {
        itemsList = JSON.parse(localStorage.itemsList);
      }

      if (localStorage.materialsList) {
        materialsList = JSON.parse(localStorage.materialsList);
      }

      if (localStorage.pointsArmorers) {
        pointsArmorers = parseInt(localStorage.pointsArmorers);
      }

      if (localStorage.pointsArtificers) {
        pointsArtificers = parseInt(localStorage.pointsArtificers);
      }

      var itemIngredients = JSON.parse(this.responseText);

      itemIngredients.forEach((ingredient) => {
        ingredient.IDTYPE = idType;
        ingredient.TYPE = type;

        var materialAdd = false;
        materialsList.forEach((item) => {
          if (ingredient.ID == item.ID && ingredient.IDTYPE == item.IDTYPE) {
            item.QUANTITY = parseInt(item.QUANTITY) + parseInt(ingredient.QUANTITY);
            materialAdd   = true;
          }
        });

        if (!materialAdd) {
          materialsList.push(ingredient);
        }
      });

      var itemAdd = false;
      itemsList.forEach((item) => {
        if (item.ID == idItem && item.IDTYPE == idType) {
          item.QUANTITY = parseInt(item.QUANTITY) + parseInt(quantity);
          itemAdd       = true;
        }
      });

      if (!itemAdd) {
        itemsList.push({
          ID:          idItem,
          DESCRIPTION: Item,
          QUANTITY:    quantity,
          IDTYPE:      idType,
          TYPE:        type,
        });
      }

      if (idCategory == 0 || idCategory == 1) {
        pointsArtificers = parseInt(pointsArtificers) + parseInt(points);
      }

      if (idCategory == 2 || idCategory == 3) {
        pointsArmorers = parseInt(pointsArmorers) + parseInt(points);
      }

      localStorage.itemsList        = JSON.stringify(itemsList);
      localStorage.materialsList    = JSON.stringify(materialsList);
      localStorage.pointsArmorers   = pointsArmorers;
      localStorage.pointsArtificers = pointsArtificers;

      var message = '<div class="alert alert-success alert-dismissible fade show" id="msg-alert">' +
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                      '<strong>Success</strong> Item added on list.' +
                    '</div>';

      document.getElementById("alert").innerHTML = message;

      $("#msg-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#msg-alert").slideUp(500);
      });

      showTables();
    }
  };

  xmlhttp.open("GET", "getIngredients.php?idItem=" + idItem + "&quantity=" + quantity, true);
  xmlhttp.send();

  clearForm();
}

function showTables() {
  this.materialShow();
  this.itemShow();
  this.priceShow();
}

function materialShow() {
  var tableMaterials = "";
  var materialsList  = [];
  if (localStorage.materialsList) {
    materialsList = JSON.parse(localStorage.materialsList);
  }

  if (materialsList.length > 0) {
    tableMaterials += '<table class="table table-hover">';
    tableMaterials +=   '<thead>';
    tableMaterials +=     '<tr>';
    tableMaterials +=       '<th colspan="3">Material</th>';
    tableMaterials +=       '<th style="text-align:right">Quantity</th>';
    tableMaterials +=       '<th style="text-align:right">3 Accs</th>';
    tableMaterials +=     '</tr>';
    tableMaterials +=   '</thead>';
    tableMaterials +=   '<tbody>';

    materialsList.forEach((material) => {
      var type = material.IDTYPE > 0 ? " (" + material.TYPE + ")" : "";

      tableMaterials +=   '<tr>';
      tableMaterials +=     '<td colspan="3">' + material.DESCRIPTION + type + '</td>';
      tableMaterials +=     '<td style="text-align:right">' + material.QUANTITY + '</td>';
      tableMaterials +=     '<td style="text-align:right">' + (parseInt(material.QUANTITY) * 3) + '</td>';
      tableMaterials +=   '</tr>';
    });

    tableMaterials +=   '</tbody>';
    tableMaterials += '</table>';
  }

  document.getElementById("materialsList").innerHTML = tableMaterials;
}

function priceChange(idMaterial) {
  var price         = document.getElementById('edPrice'+ idMaterial).value;
  var materialsList = [];
  if (localStorage.materialsList) {
    materialsList = JSON.parse(localStorage.materialsList);
  }
  console.log("idMaterial: " + idMaterial);
  console.log("price: " + price);

  materialsList.forEach((material) => {
    if (material.ID == idMaterial) {
      material.PRICE = parseInt(price);
      material.TOTAL = parseInt(price) * parseInt(material.QUANTITY);
    }
  });

  localStorage.materialsList = JSON.stringify(materialsList);
  priceShow();
}

function priceShow() {
  var tableMaterials = "";
  var materialsList = [];
  if (localStorage.materialsList) {
    materialsList = JSON.parse(localStorage.materialsList);
  }

  if (materialsList.length > 0) {
    tableMaterials += '<table class="table table-hover">';
    tableMaterials +=   '<thead>';
    tableMaterials +=     '<tr>';
    tableMaterials +=       '<th style="width: 50%">Material</th>';
    tableMaterials +=       '<th style="width: 12,5%; text-align:right">Price</th>';
    tableMaterials +=       '<th style="width: 12,5%; text-align:right">Quantity</th>';
    tableMaterials +=       '<th style="width: 12,5%; text-align:right">3 Accs</th>';
    tableMaterials +=       '<th style="width: 12,5%; text-align:right">Total (1)</th>';
    tableMaterials +=       '<th style="width: 12,5%; text-align:right">Total (3)</th>';
    tableMaterials +=     '</tr>';
    tableMaterials +=   '</thead>';
    tableMaterials +=   '<tbody>';

    materialsList.forEach((material) => {
      var type = material.IDTYPE > 0 ? " (" + material.TYPE + ")" : "";

      tableMaterials +=   '<tr>';
      tableMaterials +=     '<td style="width: 50%">' + material.DESCRIPTION + type + '</td>';
      tableMaterials +=     '<td style="width: 12,5%; text-align:right"><input type="number" class="form-control-plaintext form-control-sm" style="text-align: right;" onchange="priceChange('+ material.ID +')" value="' + material.PRICE + '"  id="edPrice'+ material.ID +'"/></td>';
      tableMaterials +=     '<td style="width: 12,5%; text-align:right">' + material.QUANTITY + '</td>';
      tableMaterials +=     '<td style="width: 12,5%; text-align:right">' + (parseInt(material.QUANTITY) * 3) + '</td>';
      tableMaterials +=     '<td style="width: 12,5%; text-align:right">' + material.TOTAL + '</td>';
      tableMaterials +=     '<td style="width: 12,5%; text-align:right">' + (parseInt(material.TOTAL) * 3) + '</td>';
      tableMaterials +=   '</tr>';
    });
    tableMaterials +=   '</tbody>';
    tableMaterials += '</table>';
  }

  document.getElementById("priceList").innerHTML = tableMaterials;
}

function itemShow() {
  var tableItems       = "";
  var itemsList        = [];
  var pointsArmorers   = 0;
  var pointsArtificers = 0;

  if (localStorage.itemsList) {
    itemsList = JSON.parse(localStorage.itemsList);
  }

  if (localStorage.pointsArmorers) {
    pointsArmorers = parseInt(localStorage.pointsArmorers);
  }

  if (localStorage.pointsArtificers) {
    pointsArtificers = parseInt(localStorage.pointsArtificers);
  }

  if (itemsList.length > 0) {
    tableItems += '<table class="table table-hover">';
    tableItems +=   '<thead>';
    tableItems +=     '<tr>';
    tableItems +=       '<th colspan="3">Item</th>';
    tableItems +=       '<th style="text-align:right">Quantity</th>';
    tableItems +=     '</tr>';
    tableItems +=   '</thead>';
    tableItems +=   '<tbody>';

    itemsList.forEach((item) => {
      var type = item.IDTYPE > 0 ? " (" + item.TYPE + ")" : "";

      tableItems +=   '<tr>';
      tableItems +=     '<td colspan="3">' + item.DESCRIPTION + type + "</td>";
      tableItems +=     '<td style="text-align:right">' + item.QUANTITY + "</td>";
      tableItems +=   '</tr>';
    });
    tableItems +=  '</tbody>';

    tableItems +=  '<tfoot>';
    tableItems +=    '<tr>';
    tableItems +=      '<td colspan="4"><b>Armorers Points: ' + pointsArmorers + "</b><i> (each Acc)</i></td>";
    tableItems +=    '</tr>';
    tableItems +=    '<tr>';
    tableItems +=      '<td colspan="4"><b>Artificers Points: ' + pointsArtificers + "</b><i> (each Acc)</i></td>";
    tableItems +=  '</tr>';
    tableItems +=  '</tfoot>';

    tableItems += '</table>';
  }

  document.getElementById("itemsList").innerHTML = tableItems;
}

function clearLists() {
  localStorage.clear();
  this.showTables();
}

function clearForm() {
  document.getElementById("cbCategory").value = "";
  document.getElementById("edQuantity").value = "1";
  document.getElementById("edPoints").value   = "1";
  this.itemLoad("");
}