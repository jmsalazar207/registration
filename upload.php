<?php   
    require_once 'myconn.php';

	if(ISSET($_POST['submit_upload'])){
		// $ICN_No = $_POST['icn_no'];
		 $Assessment_No = $_POST['SelectDrnNumber'];
        // $Property_No = $_POST['ppeno'];
		$date_uploaded = date("Y-m-d g:i a");
	//	
		if($_FILES["fileToUpload"]["name"]=="")
		{             
			echo '
				<script type = "text/javascript">
					alert("Please select file to upload.");
                    window.location = "ict_assessment_report.php";
				</script>
			';
		}
		else			
			{
            
				$target_dir = "assessment_report/".$Assessment_No;
				$target_file = $target_dir ."_". basename($_FILES["fileToUpload"]["name"]);
				$pdf = $Assessment_No."_".basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
	
            
				//check file size
				if ($_FILES["fileToUpload"]["size"] > 15000000) 
				{
					//echo "Sorry, your file is too large.";
					$uploadOk = 0;
					echo '
						<script type = "text/javascript">
                        alert("Sorry, your file is too large.");
                        window.location = "ict_assessment_report.php";
						</script>';
				}
             
				// Allow certain file formats
				if( $imageFileType != "pdf" ) 
					{
					//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
					echo '
						<script type = "text/javascript">
							alert("Sorry, only pdf files is allowed.");
							window.location = "ict_assessment_report.php";
						</script>';
					}
            
				if ($uploadOk == 0) 
				{
                    //echo "Sorry, your file was not uploaded.";
	               // if everything is ok, try to upload file
                    echo '
                    <script type = "text/javascript">
                        alert(""Sorry, your file was not uploaded."");
                        window.location =ict_assessment_report.php";
                    </script>';
	            } 
				else 
				{
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
					{
						$conn->query("INSERT INTO `upload_lib`(DRN_No,Date_Uploaded,Filename) VALUES('$Assessment_No', '$date_uploaded', '$pdf')") or die(mysqli_error($conn));
						echo '
							<script type = "text/javascript">
								alert("Successfully saved data");
								window.location = "ict_assessment_report.php";
								
							</script>
						';
					}
					else 
					{
						//echo "Sorry, there was an error uploading your file.";
						echo '
							<script type = "text/javascript">
							   alert("Sorry, there was an error uploading your file.");
							   window.location = "ict_assessment_report.php";
						</script>';
					}            
            
				}
			}
	
	
	
	///
	}
	
?>