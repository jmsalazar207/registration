<form method = "POST" action = "save_personal_info.php" enctype="multipart/form-data">	
	<input type="hidden" name="empno" class="form-control"  value = "<?php echo $user['empno']; ?>">
	
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4 class="box-title">Personal Information</h4>
		</div>									
		
		<div class="box-body">
			<div class="form-group" style="width: 50%; float:left">
				<div class="row" style="padding-top: 8px">												
					<div class="col-md-2">
						<label for="surname">Surname</label>								
					</div>
					<div class="col-md-8">
						<input class="form-control" id="surname" name="surname" type="text" value= "" style="text-transform: uppercase;">
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="firstname">First Name</label>								
					</div>								
					<div class="col-md-8">
						<input class="form-control" id="firstname" name="firstname" type="text" value= "" style="text-transform: uppercase;" >
					</div>	
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="middlename">Middle Name</label>								
					</div>								
					<div class="col-md-8">
						<input class="form-control" id="middlename" name="middlename" type="text" value= "" style="text-transform: uppercase;">
					</div>									
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="name_extension">Name Extension</label>								
					</div>								
					<div class="col-md-4">
						<select name="name_extension" id="name_extension" class="form-control" >								
							<option value="">SELECT ONE</option>
							<option value="JR.">JR.</option>
							<option value="SR.">SR.</option>
							<option value="I">I</option>
							<option value="II">II</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
							<option value="V">V</option>
							<option value="VI">VI</option>
							<option value="VII">VII</option>
							<option value="VIII">VIII</option>
							<option value="IX">IX</option>
							<option value="X">X</option>											
						</select>
					</div>	
				</div>
		

				<!--Residential-->
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-6">
						<h6><b>Residential Address</b></h3>							
					</div>	
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-5">
						<input class="form-control" id="r_house_block_lot" name="r_house_block_lot" type="text" value= ""  style="text-transform: uppercase;">
						<label for="r_house_block_lot" style="font-size:10px; "><i>House/Block/Lot No.</i></label>												
					</div>	
								
					<div class="col-md-5">
						<input class="form-control" id="r_street" name="r_street" type="text" value= "" style="text-transform: uppercase;" >
						<label for="r_street" style="font-size:10px"><i>Street</i></label>												
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<input class="form-control" id="r_subdivision_village" name="r_subdivision_village" type="text" value= "" style="text-transform: uppercase;" >
						<label for="r_subdivision_village" style="font-size:10px; "><i>Subdivision/Village</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">

						<select class="form-control styleFontSelect fieldStyle styleFont" name="r_Areareg" id="r_Areareg" >
						<option value=''>REGION</option>
						</select>
						<label for="r_Areareg" style="font-size:10px; "><i>Region</i></label>
					</div>
						
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="r_Areaprovince" id="r_Areaprovince" >
							<option value=''>PROVINCE</option>
							
						</select>
							<label for="r_Areaprovince" style="font-size:10px; "><i>Province</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="r_Areacity" id="r_Areacity" >
							<option value=''>CITY/MUNICIPALITY</option>
							
						</select>
						<label for="r_Areacity" style="font-size:10px; "><i>City/Municipality</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="r_Areabrgy" id="r_Areabrgy" >
							<option value=''>BARANGAY</option>
														
						</select>
						<label for="r_Areabrgy" style="font-size:10px; "><i>Barangay</i></label>
					</div>
				</div>
				
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<input class="form-control" id="r_zipcode" name="r_zipcode" type="text" value= "" >
						<label for="r_zipcode" style="font-size:10px; "><i>Zipcode</i></label>
					</div>
				</div>
				<!--Residential-->

		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="citizenship">Citizenship</label>								
					</div>																
					<div class="col-md-4">
						<select name="citizenship" id="citizenship" class="form-control">										
								<option value="">SELECT ONE</option>
								<option value="FILIPINO" >FILIPINO</option>
								<option value="DUAL CITIZENSHIP">DUAL CITIZENSHIP</option>
						</select>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="citizenship_by">If holder of dual citizenship, please indicate the details.</label>								
					</div>
								
					<div class="col-md-4">
						<select name="citizenship_by" id="citizenship_by" class="form-control">		
						
								<option value=''>SELECT ONE</option>
								<option value="BY BIRTH">BY BIRTH</option>
								<option value="BY NATURALIZATION">BY NATURALIZATION</option>
						</select>
					</div>
								
					<div class="col-md-4">
						<select  class="selectpicker form-control"  data-live-search="true"  name="citizenship_country" id="citizenship_country"> 
							<option value=''>SELECT ONE</option>
								                 
						</select>
									<label for="citizenship_country" style="font-size:10px; "><i>Please indicate country</i></label>
					</div>
				</div>
		
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="height">Height (m)</label>								
					</div>								
					<div class="col-md-2">
						<input class="form-control" id="height" name="height" type="number" value= "">
					</div>									
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="weight">Weight (kg)</label>								
					</div>								
					<div class="col-md-2">
						<input class="form-control" id="weight" name="weight" type="number" value=  "">
					</div>										
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="blood_type">Blood Type</label>								
					</div>								
					<div class="col-md-4">
						<input class="form-control" id="blood_type" name="blood_type" type="text" value=  "" style="text-transform: uppercase;">
					</div>									
				</div>	

				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="email_address">Email Address (if any)</label>								
					</div>								
					<div class="col-md-4">
						<input class="form-control" id="email_address" name="email_address" type="email" value= "">
					</div>									
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="telephone_no">Telephone No.</label>								
					</div>								
					<div class="col-md-4">
						<input class="form-control" id="telephone_no" name="telephone_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="mobile_no">Mobile No.</label>								
					</div>								
					<div class="col-md-4">
						<input class="form-control" id="mobile_no" name="mobile_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>				
			</div>	
			
			<!-- HALF -->
			<div class="form-group" style="width: 50%; float:left">
				
				<div class = "row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="date_of_birth">Date of Birth</label>				
					</div>								
					<div class="col-md-8">
						<input class="form-control" id="date_of_birth" name="date_of_birth" type="date" value=""style="text-transform: uppercase;">
					</div>											
				</div>	
			
				<div class = "row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="place_of_birth">Place of Birth</label>								
					</div>								
					<div class="col-md-8">
						<input class="form-control" id="place_of_birth" name="place_of_birth" type="text" value= "" style="text-transform: uppercase;">
					</div>											
				</div>
		
				<div class = "row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="sex">Sex</label>								
					</div>								
					<div class="col-md-4">
						<select name="sex" id="sex" class="form-control">
									<option value="">SELECT ONE</option>
									<option value="MALE">MALE</option>
									<option value="FEMALE" >FEMALE</option>
						</select>
					</div>	
				</div>
		
				<div class = "row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="civil_status">Civil Status</label>								
					</div>								
					<div class="col-md-3">
						<select name="civil_status" id="civil_status" class="form-control">
							<option value="">SELECT ONE</option>
							<option value="SINGLE">SINGLE</option>
							<option value="MARRIED">MARRIED</option>
							<option value="WIDOWED">WIDOWED</option>
							<option value="SEPARATED">SEPARATED</option>
							<option value="OTHER/S" >OTHER/S</option>	
						</select>
					</div>
					
					<div class="col-md-1">
						<label for="civil_status_other">Other/s</label>								
					</div>
					<div class="col-md-4">
						<input class="form-control" id="civil_status_other" name="civil_status_other" type="text" value="" >								
					</div>							
				</div>


				<!--Permanent Address-->
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-6">
						<h6><b>Permanent Address</b></h3>							
					</div>	
				</div>
			
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-5">
						<input class="form-control" id="p_house_block_lot" name="p_house_block_lot" type="text" value= ""style="text-transform: uppercase;" >
						<label  for="p_house_block_lot" style="font-size:10px "><i>House/Block/Lot No.</i></label>												
					</div>	
								
					<div class="col-md-5">
						<input class="form-control" id="p_street" name="p_street" type="text" value= "" style="text-transform: uppercase;">
						<label for="p_street" style="font-size:10px"><i>Street</i></label>												
					</div>											
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<input class="form-control" id="p_subdivision_village" name="p_subdivision_village" type="text" value= ""  style="text-transform: uppercase;">
						<label for="p_subdivision_village" style="font-size:10px; "><i>Subdivision/Village</i></label>
					</div>
				</div>										
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">

						<select class="form-control" name="p_Areareg" id="p_Areareg">
						<option value=''>REGION</option>
						
						</select>
						<label for="p_Areareg" style="font-size:10px; "><i>Region</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="p_Areaprovince" id="p_Areaprovince">
							<option value='' selected>PROVINCE</option>
							
							</select>
						<label for="p_Areaprovince" style="font-size:10px; "><i>Province</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="p_Areacity" id="p_Areacity" >
							<option value='' selected>CITY/MUNICIPALITY</option>
							
							
						</select>
						<label for="p_Areacity" style="font-size:10px; "><i>City/Municipality</i></label>
					</div>
				</div>
		
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<select class="form-control" name="p_Areabrgy" id="p_Areabrgy" >
							
							<option value='' selected>BARANGAY</option>
							
						</select>
						<label for="p_Areabrgy" style="font-size:10px; "><i>Barangay</i></label>
					</div>
				</div>
				
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-10">
						<input class="form-control" id="p_zipcode" name="p_zipcode" type="text" value= "" style="text-transform: uppercase;">
						<label for="p_zipcode" style="font-size:10px; "><i>Zipcode</i></label>
					</div>
				</div>
				<!--Permanent Address-->
				
		
				
				
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="gsis_no">GSIS No.</label>								
					</div>
					
					<div class="col-md-4">
						<input class="form-control" id="gsis_no" name="gsis_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
			
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="pagibig_no">Pag-Ibig No.</label>								
					</div>
					
					<div class="col-md-4">
						<input class="form-control" id="pagibig_no" name="pagibig_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
			
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="philhealth_no">Philhealth No.</label>								
					</div>
					
					<div class="col-md-4">
						<input class="form-control" id="philhealth_no" name="philhealth_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
			
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="sss_no">SSS No.</label>								
					</div>
					
					<div class="col-md-4">
						<input class="form-control" id="sss_no" name="sss_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
			
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="tin_no">TIN No.</label>								
					</div>
					<div class="col-md-4">
						<input class="form-control" id="tin_no" name="tin_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
				<div class ="row" style="padding-top: 8px">
					<div class="col-md-2">
						<label for="agency_employee_no">Agency Employee No.</label>								
					</div>
					
					<div class="col-md-4">
						<input class="form-control" id="agency_employee_no" name="agency_employee_no" type="text" value= "" style="text-transform: uppercase;">
					</div>										
				</div>
				<br/>
				<br/>
			</div>									
		</div>
		<div class="box-footer">
			<button type="submit" name="submit_personal" id="submit_personal" class="btn btn-primary pull-right">Save</button>
		</div>										
	</div>											   
</form>