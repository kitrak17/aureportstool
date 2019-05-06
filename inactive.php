<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
       <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- <div id="smb" class="tab-pane">
                <div class="row placeholders">
                    <div class="col-lg-12 col-sm-12">
                      <h4 style="text-align: left; margin-bottom:10px;">Pending Cases Break down : </h4>
                       <table id="smb_table_ir" class="table" border="1">
                          <tr>
                            <td><b>Source</b></td>
                            <td><b>In Progress</b></td>
                            <td><b>Awaiting Merchant to inititae Int.</b></td>
                            <td><b>Int. complete & KYC pending</b></td>
                            <td><b>Non INR Supported Shopping Carts</b></td>
                            <td><b>Total</b></td>
                          </tr>
                          <tr>
                            <td><b>India TeleSales</b></td>
                            <td class="tsprogressintpending"></td>
                            <td class="tsawaitintpending"></td>
                            <td class="tskycintpending"></td>
                            <td class="tsnoinrintspending"></td>
                            <td class="tstotalintpending"></td>
                          </tr>
                          <tr>
                            <td><b>AM & RM UpSells</b></td>
                            <td class="amrmprogressintpending"></td>
                            <td class="amrmawaitintpending"></td>
                            <td class="amrmkycintpending"></td>
                            <td class="amrmnoinrintspending"></td>
                            <td class="amrmtotalintpending"></td>
                          </tr>
                          <tr>
                            <td><b>SMB RM</b></td>
                            <td class="smbrmprogressintpending"></td>
                            <td class="smbrmawaitintpending"></td>
                            <td class="smbrmkycintpending"></td>
                            <td class="smbrmnoinrintspending"></td>
                            <td class="smbrmtotalintpending"></td>
                          </tr>
                       </table>

                    </div>
                </div>
            </div> -->
        </div>
        </div>
      </div>
    </div>

   <?php echo include("footer.php"); ?>
    <script type="text/javascript">
    $(document).ready(function(){
      regionCalls();
      $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY-MM-DD'
          }
        }, function(start, end, label) {
            localStorage.setItem('fromDate', start.format('YYYY-MM-DD'));
            localStorage.setItem('toDate', end.format('YYYY-MM-DD'));
            regionCalls();
        });
    });
    </script>
  </body>
</html>
