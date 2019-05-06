<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="tab-content">
            <div id="smb" class="tab-pane fade in active">
                <div class="row placeholders">
                    <div class="col-lg-12 col-sm-12">
                       <div id="monthlyICT"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

    <?php echo include("footer.php"); ?>
    
    <script type="text/javascript">
    $(document).ready(function(){
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(ictCalls);
        $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY-MM-DD'
          }
        }, function(start, end, label) {
            localStorage.setItem('fromDate', start.format('YYYY-MM-DD'));
            localStorage.setItem('toDate', end.format('YYYY-MM-DD'));
           // google.charts.setOnLoadCallback(ictCalls);
           location.reload();
        });
    });
    </script>
  </body>
</html>
