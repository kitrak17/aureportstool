<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "index.php" || basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "AU") echo 'class="active"'; ?> ><a href="index.php" >Overview <span class="sr-only">(current)</span></a></li>
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "integration.php") echo 'class="active"'; ?> ><a href="integration.php">Integration Trend</a></li>
           <!-- <li><a href="#">Integration Engineer</a></li> 
            <li><a href="#">Opportunity Owner</a></li>-->
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "newproduct.php") echo 'class="active"'; ?> ><a href="newproduct.php">Product Adoption</a></li>
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "shoppingcart.php") echo 'class="active"'; ?> ><a href="shoppingcart.php">Shopping Cart wise</a></li>
            <!-- <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "inactive.php") echo 'class="active"'; ?> ><a href="inactive.php">Inactive wise</a></li> -->
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "icts.php") echo 'class="active"'; ?> ><a href="icts.php">Integration Cycle Time</a></li>
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "ecsvsecm.php") echo 'class="active"'; ?> ><a href="ecsvsecm.php">ECS vs ECM</a></li>
            <!-- <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "tpvnrevenue.php") echo 'class="active"'; ?> ><a href="tpvnrevenue.php">TPV & Revenue</a></li> -->
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "conversion.php") echo 'class="active"'; ?> ><a href="conversion.php">Conversion</a></li>
           <!--  <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "inactive.php") echo 'class="active"'; ?> ><a href="inactive.php">Inactive</a></li> -->
            <li <?php if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "upload.php") echo 'class="active"'; ?> ><a href="upload.php">Upload</a></li>
          </ul>
        </div>