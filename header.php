<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/pp-logo-150px.png" border="0" alt="PayPal Logo"></a>
        </div>
        <div class=""><h3 class="page-heading">Australia Mid Market Integration Dashboard</h3></div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <button type="button" class="btn btn-success cust2018" onclick="chooseOverview('2018')">2018 Overview</button>
            <button type="button" class="btn btn-success cust2019" onclick="chooseOverview('2019')">2019 Overview</button>
            <input type="text" name="daterange" id="daterange" value="" class="form-control"/>
          </form>
        </div>
      </div>
    </nav>