<?php
include("config.php");


//mysqli_query($con,"DROP table IF EXISTS `aucases_".$_POST['year']."`") or die(mysqli_error($con));

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `aucases` (
 `id` int(11) AUTO_INCREMENT NOT NULL,
 `int_id` varchar(255) NOT NULL,
 `int_name` varchar(255) NOT NULL,
 `int_created_date` date NOT NULL,
 `int_start_date` date NOT NULL,
 `pp_acc_num` longtext NOT NULL,
 `int_stage` varchar(25) NOT NULL,
 `int_health` varchar(25) NOT NULL,
 `api_used` varchar(25) NOT NULL,
 `target_product` text NOT NULL,
 `shopping_cart` varchar(255) NOT NULL,
 `lts_date` date NOT NULL,
 `opp_owner_name` varchar(255) NOT NULL,
 `int_owner_name` varchar(255) NOT NULL,
 `opp_record_type` varchar(100) NOT NULL,
 `closed_lost_reason` varchar(50) DEFAULT NULL,
 `created_date` varchar(25) NOT NULL,
 PRIMARY KEY (`id`,`int_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1") or die(mysqli_error($con));


// latest
//mysqli_query($con,"ALTER TABLE aucases ADD CONSTRAINT pk_ID PRIMARY KEY (id)") or die(mysqli_error($con));


if(isset($_POST["upload"])){	
 		
 		$file_name = $_FILES['file']['name'];
	    $file_size =$_FILES['file']['size'];
	    $file_tmp =$_FILES['file']['tmp_name'];
	    $file_type=$_FILES['file']['type'];
	    $extName = explode('.',$file_name);
	    $file_ext=end($extName);

	    $expensions= array("csv");

	    if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a csv.";
      }
     

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
      }else{
         print_r($errors);
      }

 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen("uploads/".$file_name, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) 
	         {
 				
 				$int_created_date = mysqli_real_escape_string($con,$getData[2]);
 				$int_created_date = str_replace('/', '-', $int_created_date);
 				//echo strtotime($int_created_date); die;
 				$int_created_date = date("Y-m-d", strtotime($int_created_date));
 				//echo $int_created_date; die;
 				$int_start_date = mysqli_real_escape_string($con,$getData[3]);
 				$int_start_date = str_replace('/', '-', $int_start_date);
 				$int_start_date = date("Y-m-d", strtotime($int_start_date));

 				$lts_date = mysqli_real_escape_string($con,$getData[10]);
 				$lts_date = str_replace('/', '-', $lts_date);
 				$lts_date = date("Y-m-d", strtotime($lts_date));

 				if($getData[0] != '' && $getData[0] != "Integration: ID") {

			           	$sql = "INSERT INTO aucases (int_id,int_name,int_created_date,int_start_date,pp_acc_num,int_stage,int_health,api_used,target_product,shopping_cart,lts_date,opp_owner_name,int_owner_name,opp_record_type,closed_lost_reason,created_date)
		                   values ('".mysqli_real_escape_string($con,$getData[0])."','".mysqli_real_escape_string($con,$getData[1])."','".$int_created_date."','".$int_start_date."','".mysqli_real_escape_string($con,$getData[4])."','".mysqli_real_escape_string($con,$getData[5])."','".mysqli_real_escape_string($con,$getData[6])."','".mysqli_real_escape_string($con,$getData[7])."','".mysqli_real_escape_string($con,$getData[8])."','".mysqli_real_escape_string($con,$getData[9])."','".mysqli_real_escape_string($con,$lts_date)."','".mysqli_real_escape_string($con,$getData[11])."','".mysqli_real_escape_string($con,$getData[12])."','".mysqli_real_escape_string($con,$getData[13])."','".mysqli_real_escape_string($con,$getData[14])."','".mysqli_real_escape_string($con,$getData[15])."') ON DUPLICATE KEY UPDATE int_id=int_id";

		                   $result = mysqli_query($con, $sql) or die(mysqli_error($con));

		         }
	         }
	         fclose($file);	
	         if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"../upload.html\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"../upload.php\"
					</script>";
				}
		 }
	}
?>