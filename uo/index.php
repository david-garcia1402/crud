<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Societys Outlands</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="data.js"></script>
  </head>
  <body onload="showTables()">
    <div class="jumbotron text-center" style="background-color: #ff9845;">
      <h1>Societys Outlands</h1>
    </div>

    <div class="container">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tabData">Societys</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabPrice">Cost</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="tabData" class="mt-2 container tab-pane active">
          <div id="alert">
          </div>

          <div class="row">
            <div class="col-lg-2">
              <label for='cbCategory'>Category</label>
              <select class="form-control" id="cbCategory" name="cbCategory" onchange="itemLoad(this.value)">
                <option value="">-- Choose --</option>
                <option value="0">Inscription</option>
                <option value="1">Alchemy</option>
                <option value="2">Tailoring</option>
                <option value="3">Blacksmith</option>
              </select>
            </div>
            <div class="col-lg-4">
              <label for='cbItem'>Item</label>
              <div id="itemData">
                <select class="form-control" id="cbItem" name="cbItem">
                  <option value="">No category chosen</option>
                </select>
              </div>
            </div>
            <div class="col-lg-2">
              <label for='cbMaterial'>Material</label>
              <select class="form-control" id="cbMaterial" name="cbMaterial" disabled="true">
                <option value="0">Regular</option>
                <option value="1">Dull</option>
                <option value="2">Shadow</option>
                <option value="3">Copper</option>
                <option value="4">Bronze</option>
                <option value="5">Golden</option>
                <option value="6">Rose</option>
                <option value="7">Vere</option>
                <option value="8">Vale</option>
                <option value="9">Avar</option>
              </select>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <label for="edQuantity">Quantity</label>
                <input type="number" class="form-control" id="edQuantity" name="edQuantity" min="1" value="1">
              </div>
            </div>
            <div class="col-lg-1">
              <div class="form-group">
                <label for="edPoints">Points</label>
                <input type="number" class="form-control" id="edPoints" name="edPoints" min="1" value="1">
              </div>
            </div>
            <div class="col-lg-1">
              <label></label>
              <button type="button" class="btn btn-block btn-primary mt-2" name="btAdd" id="btAdd" onclick="itemAdd()">Add</button>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div id="materialsList">
              </div>
            </div>
            <div class="col-lg-6">
              <div id="itemsList">
              </div>
            </div>
          </div>

          <div class="row mb-5">
            <div class="col-lg-10">
            </div>
            <div class="col-lg-2">
              <button type="button" class="btn btn-block btn-danger mt-2 mb-5" name="btClear" id="btClear" data-toggle="modal" data-target="#modalClear">Clear lists</button>
            </div>
          </div>
        </div>
        <div id="tabPrice" class="mt-2 container tab-pane fade">
          <div class="row">
            <div class="col">
              <div id="priceList">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- The Modal -->
    <div class="modal fade" id="modalClear">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Clear all itens?</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            This action will clear all lists.
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="clearLists()">Clear</button>
          </div>

        </div>
      </div>
    </div>

    <footer class="text-center text-white fixed-bottom" style="background-color: #ff9845;">
      <!-- Grid container -->
      <div class="container p-2"></div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: #ff7100;">
        v1.0 © 2022 Copyright:
        <a class="text-white" href="https://discordapp.com/users/376497357019414528/" target="_blank">Tamba#7440</a>
      </div>
      <!-- Copyright -->
    </footer>

  </body>
</html>