<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--            <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#lm">Large Merchant</a></li>
                    <li><a data-toggle="tab" href="#smb">Small Merchant Business</a></li>
                  </ul> -->

           <div class="tab-content">
            <div id="smb" class="tab-pane fade in active">
                   <div id="smbShoppingCart" style="width: 900px; height: 500px;"></div>
                   <div id="smbCustomShoppingCart" style="width: 900px; height: 500px;"></div>
            </div>
          </div>
        </div>

          
        </div>
      </div>
    </div>

    <?php echo include("footer.php"); ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(shoppingCartCalls);
      $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY-MM-DD'
          }
        }, function(start, end, label) {
            localStorage.setItem('fromDate', start.format('YYYY-MM-DD'));
            localStorage.setItem('toDate', end.format('YYYY-MM-DD'));
            //google.charts.setOnLoadCallback(shoppingCartCalls);
            location.reload();
        });
    </script>
  </body>
</html>