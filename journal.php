<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/b3bf933800.js" crossorigin="anonymous"></script>
  <script src="script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/journal.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Xero</title>


  <style>
    body {
      font-family: 'Inter';

    }

    .list-group,
    .list-group-item {
      border: none;
    }


    .btn-info {
      background-color: #2B3F61;
      color: white;
      border: 1px solid white;
      width: 120px !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">Xero</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav align-items-center">
        <a class="nav-item nav-link" href="#">Journal</a>
        <a class="nav-item nav-link" href="pricing.php">Pricing</a>


        <?php session_start(); ?>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <div class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </div>
        <?php } ?>
        <?php if (!isset($_SESSION['user_id'])) { ?>
          <a class="nav-item nav-link" href="signin.php">Sign in</a>
          <a class="nav-item nav-link btn btn-secondary" href="signup.php">Sign up
          </a>
        <?php } ?>

      </div>
    </div>
  </nav>
  <div class="container-fluid d-flex flex-column ">
    <div class="row">
      <aside class="col-lg-2">
        <div class="list-group w-100" style="width: 100%;" id="list-tab" role="tablist">
          <a href="#" class="list-group-item list-group-item-action active" data-toggle="list" role="tab" data-list-id="1">List 1</a>
          <a href="#" class="list-group-item list-group-item-action" data-toggle="list" role="tab" data-list-id="2">List 2</a>
          <a href="#" class="list-group-item list-group-item-action" data-toggle="list" role="tab" data-list-id="3">List 3</a>

        </div>
      </aside>
      <main class="col-lg-10">
        <div class="row mb-3">
          <div class="col">
            <button class="btn btn-light"><i class="fas fa-light fa-file-export"></i></button>
            <button class="btn btn-danger ml-5"><i class="fas fa-trash"></i></button>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-info float-right" data-bs-toggle="modal"
              data-bs-target="#addTradeModal">
              <i class="fas fa-plus"></i>&nbsp;Add new</button>
          </div>
        </div>
        <div class="table-container">
          <table class="table" id="tradeTable">
            <thead>
              <tr>
                <th><input type="checkbox" id="check-all"></th>
                <th>Currency pair</th>
                <th>Date</th>
                <th>Direction</th>
                <th>Stop loss</th>
                <th>Trade type</th>
                <th>Result</th>
                <th>ROI</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <!-- My modal -->

  <div class="modal fade" id="addTradeModal" tabindex="-1" aria-hidden="true" aria-labelledby="addTradeModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTradeModalLabel">Add Trade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>
          <div class="modal-body">
            <div class="mb-3">
              <label for="currency-pair" class="form-label">Currency Pair</label>
              <input type="text" class="form-control" id="currency-pair" placeholder="Enter currency pair" name="pair">
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
              <label for="direction" class="form-label">Direction</label>
              <select class="form-select" id="direction" name="direction">
                <option>Long</option>
                <option>Short</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="trade-type" class="form-label">Trade Type</label>
              <select class="form-select" id="trade-type" name="type">
                <option>Market</option>
                <option>Limit</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="stop-loss" class="form-label">Stop Loss</label>
              <input type="number" class="form-control" id="stop-loss" placeholder="Enter stop loss" name="stop_loss">
            </div>
            <div class="mb-3">
              <label for="result" class="form-label">Result</label>
              <select class="form-select" id="result" name="result">
                <option>Win</option>
                <option>Lose</option>
                <option>Breakeven</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="roi" class="form-label">ROI</label>
              <input type="number" class="form-control" id="roi" placeholder="Enter ROI" name="roi">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    const listGroupItems = document.querySelectorAll('.list-group-item');

    listGroupItems.forEach(item => {
      item.addEventListener('click', function(event) {
        event.preventDefault();
        
        const listId = this.dataset.listId;
        loadData(listId);
      });
    });

    $(document).ready(function () {
      $('#list-tab a').on('click', function (e) {
        e.preventDefault();

        $(this).addClass('active').siblings().removeClass('active');
      });
    });

    updateRowSelections();


    //Add trade to table
    $(document).ready(function () {
      loadData(1);
      var activeListId = 1;
      $('.list-group-item').on('click', function (e) {
        e.preventDefault();
        activeListId = $(this).data('list-id');
        loadData(activeListId); // Load data for the active list
      });


      // Event listener for form submission
      $('form').on('submit', function (e) {
        // Prevent form from submitting normally
        e.preventDefault();

        var formData = $('form').serializeArray();
        formData.push({ name: 'list_id', value: activeListId });

        // Submit form data via AJAX
        $.ajax({
          type: 'POST',
          url: 'functions/add-trade.php',
          data: formData,
          success: function (response) {
            if (response.success) {
              // Handle success
            } else {
              // Handle error
              console.log(response.message);
            }
            var newRow = '<tr><td><input type="checkbox" class="row-check"></td><td>' + $('input[name="pair"]').val() + '</td><td>' + $('input[name="date"]').val() + '</td><td>' + $('input[name="direction"]').val() + '</td><td>' + $('input[name="type"]').val() + '</td><td>' + $('input[name="stop_loss"]').val() + '</td><td>' + $('input[name="result"]').val() + '</td><td>' + $('input[name="roi"]').val() + '</td><td><button class="icon-button"><i class="fas fa-edit"></i></button></td></tr>';
            $('table tbody').append(newRow);

            // Clear form inputs
            $('form')[0].reset();
            $('.modal').modal('hide');
          },
          error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status);
            console.log(error);
          }
        });
      });
    });

    function loadData($listId) {
      $.ajax({
        url: 'functions/get-trades.php?list_id=' + $listId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          $('#tradeTable tbody').empty();
          var table = document.getElementById("tradeTable");
          var tbody = table.getElementsByTagName("tbody")[0];
          $.each(data.data[0], function (index, row) {
            var tr = $('<tr>');
            var checkbox = $('<input>').attr('type', 'checkbox').addClass('row-check');
            var editButton = $('<button>').addClass('icon-button').html('<i class="fas fa-edit"></i>');
            var tds = [checkbox, row.pair, row.date, row.stop_loss, row.trade_type, row.result, row.roi, editButton];

            $.each(tds, function (index, value) {
              $('<td>').html(value).appendTo(tr);
            });

            tr.appendTo(tbody);
            updateRowSelections();

          });

        },
        error: function (xhr, status, error) {
          alert('Error: ' + error);
        }
      });
    }

    function updateRowSelections() {
      const tableHeaderCheckbox = document.querySelector('thead input[type="checkbox"]');
      const tableBodyCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');

      tableHeaderCheckbox.addEventListener('click', function () {
        for (let i = 0; i < tableBodyCheckboxes.length; i++) {
          tableBodyCheckboxes[i].checked = this.checked;
          if (this.checked) {
            tableBodyCheckboxes[i].closest('tr').classList.add('selected');
          } else {
            tableBodyCheckboxes[i].closest('tr').classList.remove('selected');
          }
        }
      });

      $(function () {
        $("#check-all").click(function () {
          $(".row-check").prop("checked", $(this).prop("checked"));
        });

        $(".row-check").click(function () {
          if ($(".row-check:checked").length === $(".row-check").length) {
            $("#check-all").prop("checked", true);
          } else {
            $("#check-all").prop("checked", false);
          }
        });

        $(".row-check").click(function () {
          var row = $(this).closest("tr");
          if ($(this).prop("checked")) {
            row.addClass("selected");
          } else {
            row.removeClass("selected");
          }
        });
      });
    }

  </script>

</body>

</html>