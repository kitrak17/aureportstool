<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="tab-content">
            <div class="tab-pane fade  in active">
                   <div id="ecsVsEcm" style="width: 900px; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo include("footer.php"); ?>
    <script type="text/javascript">
    $(document).ready(function(){
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(ecsEcmCalls);
        $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY-MM-DD'
          }
        }, function(start, end, label) {
            localStorage.setItem('fromDate', start.format('YYYY-MM-DD'));
            localStorage.setItem('toDate', end.format('YYYY-MM-DD'));
            //google.charts.setOnLoadCallback(ecsEcmCalls);
            location.reload();
        });
    });
    </script>
  </body>
</html>
