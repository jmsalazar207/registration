<form method = "POST" action = "save_family_background.php" enctype="multipart/form-data">	
  <input type="hidden" name="empnofb" class="form-control"  value = "<?//=$user['empno']; ?>">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h4 class="timeline-header"><a href="#">Family Background Information</a></h4>
    </div>	
  
    <div class="box-body">
      <!-- RIGHT -->
      <div class="form-group" style="width: 50%; float:left">
        <div class="row" style="padding-top: 8px">													
          <div class="col-md-2">
            <strong>Father</strong>	
          </div>
          <div class="col-md-5">
            <input type="checkbox" id="father_deceased" name="father_deceased" >  
            <label for="father_deceased" style="font-size:10px;"> Deceased</label>														
          </div>							
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="father_surname">Surname</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="father_surname" name="father_surname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="father_firstname" >First Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="father_firstname" name="father_firstname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="father_middlename" >Middle Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="father_middlename" name="father_middlename" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
    
        <div class ="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="father_name_extension" >Name Extension</label></div>          
          <div class="col-md-4">
            <select name="father_name_extension" id="father_name_extension" class="form-control" >
              <option value="">SELECT ONE</option>
              <option value="JR." > >JR.</option>
              <option value="SR." > >SR.</option>
              <option value="I" >I</option>
              <option value="II"  >II</option>
              <option value="III" > >III</option>
              <option value="IV"  >IV</option>
              <option value="V" >V</option>
              <option value="VI"  >VI</option>
              <option value="VII" > >VII</option>
              <option value="VIII" > >VIII</option>
              <option value="IX"  >IX</option>
              <option value="X" >X</option>					
            </select>
          </div>	
        </div>
      </div>

      <!-- Left -->
      <div class="form-group" style="width: 50%; float:left">
        <div class="row" style="padding-top: 8px">
              
          <div class="col-md-2">
            <strong>Mother</strong><br>
            <strong style="font-size:10px; "> Mother's Maiden Name</strong>																										
          </div>	
          <div class="col-md-5">
            <input type="checkbox" id="mother_deceased" name="mother_deceased"> >  
            <label for="mother_deceased" style="font-size:10px;"> Deceased</label>														
          </div>												
        </div>
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="mother_surname" >Surname</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="mother_surname" name="mother_surname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="mother_firstname">First Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="mother_firstname" name="mother_firstname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="mother_middlename">Middle Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="mother_middlename" name="mother_middlename" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
    </div>									
  </div>
                    
  <div class="box box-info"> 
    <div class="box-body">
    
      <div class="form-group" style="width: 50%; float:left">
        <div class="row" style="padding-top: 8px">													
          <div class="col-md-2"><span>Spouse</span>	</div>
          <div class="col-md-5">
            <input type="checkbox" id="spouse_deceased" name="spouse_deceased">  
            <label for="spouse_deceased" style="font-size:10px; "> Deceased</label>														
          </div>							
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><strong>Surname</strong></div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_surname" name="spouse_surname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="spouse_firstname">First Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_firstname" name="spouse_firstname" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="spouse_middlename">Middle Name</label></div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_middlename" name="spouse_middlename" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
    
        <div class ="row" style="padding-top: 8px">
          <div class="col-md-2"><label for="spouse_name_extension">Name Extension</label></div>
          <div class="col-md-4">
            <select name="spouse_name_extension" id="spouse_name_extension" class="form-control" >
              <option value="">SELECT ONE</option>
              <option value="JR." > >JR.</option>
              <option value="SR." > >SR.</option>
              <option value="I" >I</option>
              <option value="II"  >II</option>
              <option value="III" > >III</option>
              <option value="IV"  >IV</option>
              <option value="V" >V</option>
              <option value="VI"  >VI</option>
              <option value="VII" > >VII</option>
              <option value="VIII" > >VIII</option>
              <option value="IX"  >IX</option>
              <option value="X" >X</option>							
            </select>
          </div>	
        </div>
      </div>
      
      
      <div class="form-group" style="width: 50%; float:left">
        <div class="row" style="padding-top: 8px">													
          <div class="col-md-2">
            <label for="spouse_occupation">Occupation</label>	
          </div>
          <div class="col-md-8">
            <input class="form-control" type="text" id="spouse_occupation" name="spouse_occupation" value="" style="text-transform: uppercase;">
              
          </div>							
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="spouse_employer">Employer/Business Name</label>								
          </div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_employer" name="spouse_employer" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="spouse_business_address">Business Address</label>								
          </div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_business_address" name="spouse_business_address" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
        
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="spouse_telephone_no">Telephone No.</label>								
          </div>										
          <div class="col-md-8">
            <input class="form-control" id="spouse_telephone_no" name="spouse_telephone_no" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>    
    
      <div class="form-group">							
        <table class="table table-bordered" id="tblChild">
          <thead>
            <tr>															
              <td width = "70%" style="font-weight:bold" >Name of child (Write fullname and list all)</td>
              <td	width = "20%" style="font-weight:bold">Date of Birth (mm/dd/yyyy)</td>
              <td width = "10%" style="font-weight:bold">Action</td>
            </tr>
          </thead>                    
          <tbody>
            
            <tr>
              <td>
                <input type='text' id='txtChild0' name='txtChild[]' class='form-control border-input text-center'  style='text-transform: uppercase;' />
              </td>                  
              <td>
                <input type='date' id='txtChildBday0' name='txtChildBday[]' class='form-control border-input text-center'/>															 
              </td>              
              <td width='1%' class='td-bold-text td-row-h'>
                <a href='#' class='AddRow'><center><i class='fa fa-plus-square fa-fw'></i></center></a>
              </td>
            </tr>            
            <?php //endif; ?>
        
            <tr>
              <td>
                <input type='hidden' id='txtRowCountFB' name='txtRowCountFB' readonly='true' value=''/>
              </td>                                
            </tr>                                        
          </tbody>
        </table>                                                 
      </div>									
    </div>

    <div class="box-footer">											
      <button type="submit" name="submit_family" id="submit_family" class="btn btn-primary pull-right">Save</button>
    </div>
  </div>								

</form>