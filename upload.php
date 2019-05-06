<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="panel panel-default">
            <div class="panel-heading">Upload Salesforce Data (in .csv format)</div>
            <div class="panel-body">
                Export data from <a href="https://goto.lightning.force.com/lightning/r/Report/00O2E000006OUMUUA4/view" target="_blank" style="text-decoration:underline">here</a><br/><br/>
                <form action="server/upload.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Upload .csv file</label>
                    <input type="file" id="file" name="file" class="form-control" placeholder="Choose File">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                </form>
              </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">Run Conversion Query</div>
            <div class="panel-body">
              <div class="form-group">
                  <label for="file">Choose Month</label>
                  <input type="text" id="date" name="date" class="form-control date-picker" autocomplete="off">
                  <small id="emailHelp" class="form-text text-muted"></small>
                </div>
               <a onClick="getConversion()" class="btn btn-primary">Run Conversion</a>
            </div>
        </div>


        </div>

          
        </div>
      </div>
    </div>

    <?php echo include("footer.php"); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

      <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
<style id="compiled-css" type="text/css">
      .ui-datepicker-calendar {
    display: none;
    }
  </style>
<script type="text/javascript">
window.onload=function(){
   $(function() {
      var date=new Date();
      var year=date.getFullYear(); //get year
      var month=date.getMonth(); //get month

      $('.date-picker').datepicker({
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          dateFormat: 'yy-mm-dd',
          endDate: "-1m",
          onClose: function(dateText, inst) { 
              $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
          }
      });
  });
 }
    </script>
  </body>
</html>
