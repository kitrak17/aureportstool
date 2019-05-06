<?php include("header.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include("sidebar.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div id="smb" class="tab-pane">
                <div class="row placeholders">
                    <div class="col-lg-12 col-sm-12">
                      <h4 style="text-align: left">Integration Requests : </h4>
                       <table id="smb_table_ir" class="table table-striped table-dark" border="1">
                          <tr>
                            <th scope="col"><b>Source</b></th>
                            <th scope="col"><b>Domestic</b></th>
                            <th scope="col"><b>Overseas</b></th>
                            <th scope="col"><b>Both</b></th>
                            <th scope="col"><b>Total</b></th>
                          </tr>
                          <tr>
                            <td scope="row"><b>India TeleSales</b></td>
                            <td class="dintsir"></td>
                            <td class="ointsir"></td>
                            <td class="bintsir"></td>
                            <td class="tintsir"></td>
                          </tr>
                          <tr>
                            <td scope="row"><b>AM & RM UpSells</b></td>
                            <td class="damrmir"></td>
                            <td class="oamrmir"></td>
                            <td class="bamrmir"></td>
                            <td class="tamrmir"></td>
                          </tr>
                          <tr>
                            <td><b>SMB RM</b></td>
                            <td class="dsmbrmir"></td>
                            <td class="osmbrmir"></td>
                            <td class="bsmbrmir"></td>
                            <td class="tsmbrmir"></td>
                          </tr>
                       </table>

                       <h4 style="text-align: left">LTS : </h4>
                       <table id="smb_table_lts" class="table" border="1">
                          <tr>
                            <td><b>Source</b></td>
                            <td><b>Domestic</b></td>
                            <td><b>Overseas</b></td>
                            <td><b>Both</b></td>
                            <td><b>Total</b></td>
                          </tr>
                          <tr>
                            <td><b>India TeleSales</b></td>
                            <td class="dints"></td>
                            <td class="oints"></td>
                            <td class="bints"></td>
                            <td class="tints"></td>
                          </tr>
                          <tr>
                            <td><b>AM & RM UpSells</b></td>
                            <td class="damrm"></td>
                            <td class="oamrm"></td>
                            <td class="bamrm"></td>
                            <td class="tamrm"></td>
                          </tr>
                          <tr>
                            <td><b>SMB RM</b></td>
                            <td class="dsmbrm"></td>
                            <td class="osmbrm"></td>
                            <td class="bsmbrm"></td>
                            <td class="tsmbrm"></td>
                          </tr>
                       </table>

                       <h4 style="text-align: left">Pending : </h4>
                       <table id="smb_table_pending" class="table" border="1">
                          <tr>
                            <td><b>Source</b></td>
                            <td><b>Domestic</b></td>
                            <td><b>Overseas</b></td>
                            <td><b>Both</b></td>
                            <td><b>Total</b></td>
                          </tr>
                          <tr>
                            <td><b>India TeleSales</b></td>
                            <td class="dintspending"></td>
                            <td class="ointspending"></td>
                            <td class="bintspending"></td>
                            <td class="tintspending"></td>
                          </tr>
                          <tr>
                            <td><b>AM & RM UpSells</b></td>
                            <td class="damrmpending"></td>
                            <td class="oamrmpending"></td>
                            <td class="bamrmpending"></td>
                            <td class="tamrmpending"></td>
                          </tr>
                          <tr>
                            <td><b>SMB RM</b></td>
                            <td class="dsmbrmpending"></td>
                            <td class="osmbrmpending"></td>
                            <td class="bsmbrmpending"></td>
                            <td class="tsmbrmpending"></td>
                          </tr>
                       </table>
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
      regionCalls();
      $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY-MM-DD'
          }
        }, function(start, end, label) {
            localStorage.setItem('fromDate', start.format('YYYY-MM-DD'));
            localStorage.setItem('toDate', end.format('YYYY-MM-DD'));
            //regionCalls();
            location.reload();
        });
    });
    </script>
  </body>
</html>
