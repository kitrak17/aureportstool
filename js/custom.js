$(document).ready(function() {
   if(!localStorage.fromDate) {
      localStorage.setItem('fromDate','2019-01-01');
      localStorage.setItem('toDate','2019-12-31');
   }
   $('#daterange').val(localStorage.fromDate +' - '+ localStorage.toDate);

   var url = window.location.pathname;
   var filename = url.substring(url.lastIndexOf('/')+1);
   if(filename == "integration.php" || filename == "ict.php" || filename == "icts.php") {
      //document.getElementById("daterange").disabled = true; 
      //$("#daterange").css({"background-color":"grey"});
      $("#daterange").hide();
   }

   if(filename == "index.php") {
      // document.getElementsByClassName("cust2018").disabled = true; 
      // document.getElementsByClassName("cust2019").disabled = true; 
      // $(".cust2018").css({"background-color":"grey"});
      // $(".cust2019").css({"background-color":"grey"});
      // document.getElementById("daterange").disabled = true; 
      // $("#daterange").css({"background-color":"grey"});
      $(".cust2018").hide();
      $(".cust2019").hide();
      $("#daterange").hide();
   }

   var fyear = localStorage.fromDate.split('-');
   var tyear = localStorage.toDate.split('-');

   if(fyear[0] == tyear[0]) {
      $('.cust'+fyear[0]).addClass('btn-primary').removeClass('btn-success');
   } else {
      $('.cust'+fyear[0]).addClass('btn-success').removeClass('btn-primary');
   }

});

function chooseOverview(year){
  localStorage.setItem('fromDate',year+'-01-01');
  localStorage.setItem('toDate',year+'-12-31');
  location.reload();
}

function dashboardCalls() {
   /*$.ajax({
      url: 'server/lm_dashboard.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
      type: 'GET',
      error: function() {
         $('#info').html('<p>An error has occurred</p>');
      },
      success: function(result) {
         var data = JSON.parse(result);
         $('.lm_lts_yr').html(data.lts_yr);
         $('.lm_pending_yr').html(data.pending_yr);
         $('.lm_total_yr').html(data.total_yr);
      }
   });*/
   $.ajax({
      url: 'server/smb_dashboard.php?fromDate=2019-01-01&toDate=2019-12-31',
      type: 'GET',
      error: function() {
         $('#info').html('<p>An error has occurred</p>');
      },
      success: function(result) {
         var data = JSON.parse(result);
         $('.smb_lts_yr').html(data.lts_yr);
         $('.smb_pending_yr').html(data.pending_yr);
         $('.smb_total_yr').html(data.total_yr);
      }
   });
}

function integrationCalls() {

   $.ajax({
       url: 'server/smb_int_stage_cases_lts.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
       type: 'GET',
       error: function() {
          $('#info').html('<p>An error has occurred</p>');
       },
       success: function(result) {
           lts_data = $.parseJSON(result);
           var new_lts_data=[];
           $.each(lts_data, function(key, value) {
             if(value[0] == "Element") {
               new_lts_data.push([value[0],value[1],value[1],value[2],value[2]]);
             } else {
                  if((parseInt(value[1]) || parseInt(value[2])) > 0)
                   new_lts_data.push([value[0],parseInt(value[1]),parseInt(value[1]),parseInt(value[2]),parseInt(value[2])]);
             }
           });

           drawSmbChartCasesLTS(new_lts_data);
       }
    });
}

function conversionCalls() {

   $.ajax({
       url: 'server/conversion_monthly.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
       type: 'GET',
       error: function() {
          $('#info').html('<p>An error has occurred</p>');
       },
       success: function(result) {
            con_data = $.parseJSON(result);
           var new_con_data=[];
           $.each(con_data, function(key, value) {
                   new_con_data.push([value[0],parseInt(value[1]),parseInt(value[1])]);
           });
           drawConversionMonthly(new_con_data);
       }
    });
}

function ictStaticCalls() {
   $.ajax({
       url: 'server/ict_monthly.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
       type: 'GET',
       error: function() {
          $('#info').html('<p>An error has occurred</p>');
       },
       success: function(result) {
            ict_data = $.parseJSON(result);
           var new_ict_data=[];
           // $.each(ict_data, function(key, value) {
           //         new_ict_data.push([value[0],parseInt(value[1]),parseInt(value[1])]);
           // });
           var fyear = localStorage.fromDate.split('-');
           if(fyear[0] == '2018') {
                  var new_ict_data = [
                                        ["Jan", 9.5, 9.5],
                                        ["Feb", 11, 11],
                                        ["Mar", 7, 7],
                                        ["Apr", 14, 14],
                                        ["May", 10, 10],
                                        ["Jun", 9.4, 9.4],
                                        ["Jul", 10.4, 10.4],
                                        ["Aug", 8, 8],
                                        ["Sep", 17.6, 17.6],
                                        ["Oct", 16.5, 16.5],
                                        ["Nov", 15.6, 15.6],
                                        ["Dec", 16, 16],
                                  ];
           } else if(fyear[0] == '2019') {
                  var new_ict_data = [
                                        ["Jan", 15, 15],
                                        ["Feb", 11, 11],
                                        ["Mar", 5.9, 5.9]
                                ];
           }
           drawIctMonthly(new_ict_data);
       }
    });
}


function ictCalls() {
   $.ajax({
       url: 'server/ict_monthly.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
       type: 'GET',
       error: function() {
          $('#info').html('<p>An error has occurred</p>');
       },
       success: function(result) {
            ict_data = $.parseJSON(result);
           var new_ict_data=[];
           $.each(ict_data, function(key, value) {
                   new_ict_data.push([value[0],parseInt(value[1]),parseInt(value[1])]);
           });
           /*var fyear = localStorage.fromDate.split('-');
           if(fyear[0] == '2018') {
                  var new_ict_data = [
                                        ["Jan", 9.5, 9.5],
                                        ["Feb", 11, 11],
                                        ["Mar", 7, 7],
                                        ["Apr", 14, 14],
                                        ["May", 10, 10],
                                        ["Jun", 9.4, 9.4],
                                        ["Jul", 10.4, 10.4],
                                        ["Aug", 8, 8],
                                        ["Sep", 17.6, 17.6],
                                        ["Oct", 16.5, 16.5],
                                        ["Nov", 15.6, 15.6],
                                        ["Dec", 16, 16],
                                  ];
           } else if(fyear[0] == '2019') {
                  var new_ict_data = [
                                        ["Jan", 16, 16],
                                        ["Feb", 11, 11],
                                        ["Mar", 5.9, 5.9]
                                ];
           }*/
           drawIctMonthly(new_ict_data);
       }
    });
}

function regionCalls() {

      $.ajax({
          url: 'server/smb_int_stage_cases_lts_combined.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);

              $.each(result, function(key, value) {
                if(value[1] == 'APAC Telesales' && value[0] == 'Domestic') { $('.dints').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Global') { $('.oints').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Both') { $('.bints').html(value[2]); }

                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Domestic') { $('.damrm').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Global') { $('.oamrm').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Both') { $('.bamrm').html(value[2]); }

                if(value[1] == 'APAC SMB RM' && value[0] == 'Domestic') { $('.dsmbrm').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Global') { $('.osmbrm').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Both') { $('.bsmbrm').html(value[2]); }

                var tints = (parseInt($("#smb_table_lts").find(".dints").html()) || 0) + (parseInt($("#smb_table_lts").find(".oints").html()) || 0) + (parseInt($("#smb_table_lts").find(".bints").html()) || 0);
                $('.tints').html(tints);

                var tamrm = (parseInt($("#smb_table_lts").find(".damrm").html()) || 0) + (parseInt($("#smb_table_lts").find(".oamrm").html()) || 0) + (parseInt($("#smb_table_lts").find(".bamrm").html()) || 0);
                $('.tamrm').html(tamrm);

                var tsmbrm = (parseInt($("#smb_table_lts").find(".dsmbrm").html()) || 0) + (parseInt($("#smb_table_lts").find(".osmbrm").html()) || 0) + (parseInt($("#smb_table_lts").find(".bsmbrm").html()) || 0);
                $('.tsmbrm').html(tsmbrm);
              });
          }
       });


      $.ajax({
          url: 'server/smb_int_stage_cases_ir_combined.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              
              $.each(result, function(key, value) {
                if(value[1] == 'APAC Telesales' && value[0] == 'Domestic') { $('.dintsir').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Global') { $('.ointsir').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Both') { $('.bintsir').html(value[2]); }

                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Domestic') { $('.damrmir').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Global') { $('.oamrmir').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Both') { $('.bamrmir').html(value[2]); }

                if(value[1] == 'APAC SMB RM' && value[0] == 'Domestic') { $('.dsmbrmir').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Global') { $('.osmbrmir').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Both') { $('.bsmbrmir').html(value[2]); }

                var tintsir = (parseInt($("#smb_table_ir").find(".dintsir").html()) || 0) + (parseInt($("#smb_table_ir").find(".ointsir").html()) || 0) + (parseInt($("#smb_table_ir").find(".bintsir").html()) || 0);
                $('.tintsir').html(tintsir);

                var tamrmir = (parseInt($("#smb_table_ir").find(".damrmir").html()) || 0) + (parseInt($("#smb_table_ir").find(".oamrmir").html()) || 0) + (parseInt($("#smb_table_ir").find(".bamrmir").html()) || 0);
                $('.tamrmir').html(tamrmir);

                var tsmbrmir = (parseInt($("#smb_table_ir").find(".dsmbrmir").html()) || 0) + (parseInt($("#smb_table_ir").find(".osmbrmir").html()) || 0) + (parseInt($("#smb_table_ir").find(".bsmbrmir").html()) || 0);
                $('.tsmbrmir').html(tsmbrmir);
              });
          }
       });

      $.ajax({
          url: 'server/smb_int_stage_cases_pending_combined.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              
              $.each(result, function(key, value) {
                if(value[1] == 'APAC Telesales' && value[0] == 'Domestic') { $('.dintspending').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Global') { $('.ointspending').html(value[2]); }
                if(value[1] == 'APAC Telesales' && value[0] == 'Both') { $('.bintspending').html(value[2]); }

                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Domestic') { $('.damrmpending').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Global') { $('.oamrmpending').html(value[2]); }
                if(value[1] == 'APAC AM & RM Upsells' && value[0] == 'Both') { $('.bamrmpending').html(value[2]); }

                if(value[1] == 'APAC SMB RM' && value[0] == 'Domestic') { $('.dsmbrmpending').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Global') { $('.osmbrmpending').html(value[2]); }
                if(value[1] == 'APAC SMB RM' && value[0] == 'Both') { $('.bsmbrmpending').html(value[2]); }

                var tintspending = (parseInt($("#smb_table_pending").find(".dintspending").html()) || 0) + (parseInt($("#smb_table_pending").find(".ointspending").html()) || 0) + (parseInt($("#smb_table_pending").find(".bintspending").html()) || 0);
                $('.tintspending').html(tintspending);

                var tamrmpending = (parseInt($("#smb_table_pending").find(".damrmpending").html()) || 0) + (parseInt($("#smb_table_pending").find(".oamrmpending").html()) || 0) + (parseInt($("#smb_table_pending").find(".bamrmpending").html()) || 0);
                $('.tamrmpending').html(tamrmpending);

                var tsmbrmpending = (parseInt($("#smb_table_pending").find(".dsmbrmpending").html()) || 0) + (parseInt($("#smb_table_pending").find(".osmbrmpending").html()) || 0) + (parseInt($("#smb_table_pending").find(".bsmbrmpending").html()) || 0);
                $('.tsmbrmpending').html(tsmbrmpending);
              });
          }
       });
}


 function newProductCalls() {
      /*$.ajax({
          url: 'server/newproduct.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "Products") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawChartProAdopt(data);
          }
       });*/
      $.ajax({
          url: 'server/smbnewproduct.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "Products") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawSmbChartProAdopt(data);
          }
       });

      $.ajax({
          url: 'server/newproductadoption.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "Products") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawNewChartProAdopt(data);
          }
       });
  }

 function shoppingCartCalls() {
      $.ajax({
          url: 'server/smbshoppingcart.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "Shopping Carts") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawSmbShoppingCart(data);
          }
       });
      $.ajax({
          url: 'server/smbcustomshoppingcart.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "Shopping Carts") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawSmbCustomShoppingCart(data);
          }
       });
}

function ecsEcmCalls() {
      $.ajax({
          url: 'server/ecsvsecm.php?fromDate='+localStorage.fromDate+'&toDate='+localStorage.toDate,
          type: 'GET',
          error: function() {
             $('#info').html('<p>An error has occurred</p>');
          },
          success: function(result) {
              result = $.parseJSON(result);
              var data=[];
              $.each(result, function(key, value) {
                if(value[0] == "ECS vs ECM") {
                  data.push([value[0],value[1]]);
                } else {
                  data.push([value[0],parseInt(value[1])]);
                }
              });
              drawEcsVsEcm(data);
          }
       }); 
}

function getDateOfISOWeek(w, y) {
    var simple = new Date(y, 0, 1 + (w - 1) * 7);
    var dow = simple.getDay();
    var ISOweekStart = simple;
    if (dow <= 4)
        ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
    else
        ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());
    return ISOweekStart;
}


function drawChartCasesLTS(RawData) {
    var data = new google.visualization.DataTable();
    data.addColumn('date', 'Date');
    data.addColumn('number', 'No. of Total Cases');
    data.addColumn('number', 'No. of LTS');
    data.addRows(RawData);

    /* var data = google.visualization.arrayToDataTable(data);
    var view = new google.visualization.DataView(data); */
    var cases_lts_options = {
      title: "Monthly Integration Cases vs LTS Trend",
      width: 1000,
      height: 400,
      hAxis: {title: 'Date', format: 'MMM yy'},
      vAxis: {title: 'No. of LTS','maxValue':3},
      colors: ['#E94D20', '#ECA403', '#63A74A'],
      legend: { position: "none" },
      pointSize: 10,
    };
    var weeklyCasesLTS = new google.visualization.LineChart(document.getElementById("weeklyCasesLTS"));
    weeklyCasesLTS.draw(data, cases_lts_options);
}

function drawSmbChartCasesLTS(RawData) {
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Month');
       data.addColumn('number', 'No. of Total Leads');
       data.addColumn({type: 'number', role: 'annotation'});
       data.addColumn('number', 'No. of LTS');
       data.addColumn({type: 'number', role: 'annotation'});
       data.addRows(RawData);

       /* var data = google.visualization.arrayToDataTable(data);
       var view = new google.visualization.DataView(data); */
       var cases_lts_options = {
         title: "Monthly Integration Leads vs LTS Trend",
         width: 1000,
         height: 400,
         hAxis: {title: 'Month', gridlines: { count: RawData.length } },
         vAxis: {title: 'Total Leads vs LTS'},
         colors: ['#E94D20', '#137801'],
         //legend: { position: "none" },
         pointSize: 10,
          tooltip: {trigger: 'none'}
       };

       var weeklySmbCasesLTS = new google.visualization.LineChart(document.getElementById("weeklySmbCasesLTS"));
       weeklySmbCasesLTS.draw(data, cases_lts_options);
}

/* function drawConversionOfLTS(RawData) {
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Month');
       data.addColumn('number', 'Conversion Rate');
       data.addColumn({type: 'number', role: 'annotation'});
       data.addRows([["Jan", 57, 57], ["Feb", 60,60], ["Mar", 57,57], ["Apr", 52,52], ["May", 55,55], ["Jun", 56,56], ["Jul", 54,54], ["Aug", 53,53], ["Sep", 56,56], ["Oct", 59,59], ["Nov", 58,58], ["Dec", 61,61]]);
       //console.log([["Jan", 34, 34, 14, 14], ["Feb", 34, 34, 14, 14], ["Mar", 34, 34, 14, 14]]);
       //data.addRows(RawData);

       // var data = google.visualization.arrayToDataTable(data);
       // var view = new google.visualization.DataView(data); 
       var cases_lts_options = {
         title: "Monthly Conversion",
         width: 1000,
         height: 400,
         hAxis: {title: 'Month', gridlines: { count: RawData.length } },
         vAxis: {title: 'Conversion Rate'},
         colors: ['#E94D20', '#137801'],
         //legend: { position: "none" },
         pointSize: 10,
          tooltip: {trigger: 'none'}
       };
       var weeklySmbCasesLTS = new google.visualization.LineChart(document.getElementById("conversionOfLTS"));
       weeklySmbCasesLTS.draw(data, cases_lts_options);
} */

function drawIctMonthly(RawData) {
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Month');
       data.addColumn('number', 'No. of Days');
       data.addColumn({type: 'number', role: 'annotation'});
       data.addRows(RawData);

       /* var data = google.visualization.arrayToDataTable(data);
       var view = new google.visualization.DataView(data); */
       var cases_lts_options = {
         title: "Monthly Integration Cycle Time",
         width: 1000,
         height: 400,
         hAxis: {title: 'Month', gridlines: { count: RawData.length } },
         vAxis: {title: 'No. of days'},
         colors: ['#f4a442'],
         legend: { position: 'top'  },
        annotations: { alwaysOutside: true },
         pointSize: 10,
          tooltip: {trigger: 'none'}
       };

      //  var cases_lts_options = {
      //   title: "Monthly Integration Cycle Time",
      //   width: 1000,
      //   height: 400,
      //   colors: ['#f4a442'],
      //   legend: { position: "none" },
      //   pointSize: 10,
      // };

       var drawIctMonthlyCases = new google.visualization.ColumnChart(document.getElementById("monthlyICT"));
       drawIctMonthlyCases.draw(data, cases_lts_options);
}


function drawConversionMonthly(RawData) {
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Month');
       data.addColumn('number', 'Conversion Rate');
       data.addColumn({type: 'number', role: 'annotation'});
       data.addRows(RawData);

       /* var data = google.visualization.arrayToDataTable(data);
       var view = new google.visualization.DataView(data); */
       var cases_lts_options = {
         title: "Monthly Conersioin Rate",
         width: 1000,
         height: 400,
         hAxis: {title: 'Month', gridlines: { count: RawData.length } },
         vAxis: {title: 'Conversion Rate'},
         colors: ['#f4a442'],
         legend: { position: 'top'  },
        annotations: { alwaysOutside: true }, 
         pointSize: 10,
        tooltip: {trigger: 'none'},
       };


       var drawConversionMonthlyCases = new google.visualization.ColumnChart(document.getElementById("monthlyConversion"));
       drawConversionMonthlyCases.draw(data, cases_lts_options);
}


function drawSmbChartProAdopt(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var doptions = {
    title: 'Overall Product Adoption',
    width: 900,
    height: 500
  };
  var smbProductAdoption = new google.visualization.PieChart(document.getElementById('smbProductAdoption'));
  smbProductAdoption.draw(data, doptions);
}

function drawNewChartProAdopt(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'New Product Adoption',
    width: 900,
    height: 500
  };
  var chart = new google.visualization.PieChart(document.getElementById('newProductAdoption'));
  chart.draw(data, options);
}


function drawSmbShoppingCart(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'Shopping Carts',
    width: 900,
    height: 500
  };
  var chart = new google.visualization.PieChart(document.getElementById('smbShoppingCart'));
  chart.draw(data, options);
}

function drawSmbCustomShoppingCart(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'Custom vs Shopping Carts',
    width: 900,
    height: 500
  };
  var smbCustomShoppingCart = new google.visualization.PieChart(document.getElementById('smbCustomShoppingCart'));
  smbCustomShoppingCart.draw(data, options);
}

function drawEcsVsEcm(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'Express Checkout Shortcut vs Express Checkout Mark',
    width: 900,
    height: 500
  };
  var ecsVsEcm = new google.visualization.PieChart(document.getElementById('ecsVsEcm'));
  ecsVsEcm.draw(data, options);
}

function drawSmbChartCasesSplit_SMB(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'SMB',
    width: 400,
    height: 300
  };
  var chart = new google.visualization.PieChart(document.getElementById('weeklySmbCasesSplitUpSMB'));
  chart.draw(data, options);
}

function drawSmbChartCasesSplit_AMRM(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'AM RM',
    width: 400,
    height: 300
  };
  var chart = new google.visualization.PieChart(document.getElementById('weeklySmbCasesSplitUpAMRM'));
  chart.draw(data, options);
}

function drawSmbChartCasesSplit_SMBRM(rawData) {
  var data = google.visualization.arrayToDataTable(rawData);
  var options = {
    title: 'SMB RM',
    width: 400,
    height: 300
  };
  var chart = new google.visualization.PieChart(document.getElementById('weeklySmbCasesSplitUpSMBRM'));
  chart.draw(data, options);
}

function getConversion() {

   $.ajax({
          url: 'http://127.0.0.1:3000/getConversion/'+$('#date').val(),
          type: 'GET',
          error: function(jqXHR, textStatus, errorThrown) {
             alert("Node server is not running");
          },
          success: function(result) {
            alert("Request sent! Data would be available after 5-10 mins");
          }
       });
}

