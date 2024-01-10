<form method = "POST" action = "save_work_experience.php" enctype="multipart/form-data">	
  <input type="hidden" name="empnoW" class="form-control"  value = "">
  <div class="box box-primary">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Work Experience</a></h4>
    </div>
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <table  class="table table-bordered" id="tblWork">
          <thead  >
            <th width = "20%"  colspan = 2>Inclusive Date</th>
            <th width = "20%"  rowspan=2 >Position Title</th>
            <th width = "15%">Department/Agency/Office/Company</th>
            <th width = "10%">Montly Salary</th>
            <th width = "10%">Salary/Job/Pay Grade</th>
            <th width = "10%">Status of Appointment</th>
            <th width = "10%">Goverment Service (Y/N)</th>
            <th width = "5%"></th>
          </thead>
          
          <tbody>
            <tr>
              <td>From</td>
              <td>TO</td>
            </tr>
            <tr>
                  <td>
                    <input type= "date" class="form-control" id="work_date_from" name="work_date_from[]" value= "" style="text-transform: uppercase;">
                  </td>
                  <td>
                    <input type= "date" class="form-control" id="work_date_to" name="work_date_to[]" value= "" style="text-transform: uppercase;">
                  </td>
                  <td>
                    <input class="form-control" id="work_position_title" name="work_position_title[]" type="text"  value= "" style="text-transform: uppercase;">
                  </td>
                  <td>
                    <input class="form-control" id="work_department" name="work_department[]" type="text" value= "" style="text-transform: uppercase;">
                  </td>
                  <td>
                    <input class="form-control" id="work_monthly_salary" name="work_monthly_salary[]" type="number" value= "">
                  </td>
                  <td>
                    <input class="form-control" id="work_salary_grade" name="work_salary_grade[]" type="text" value= ""style="text-transform: uppercase;">
                  </td>
                  <td>
                    <input class="form-control" id="work_status_of_appointment" name="work_status_of_appointment[]" type="text" value= "" style="text-transform: uppercase;"  >
                  </td>
                  <td>
                    <input class="form-control" id="work_govt_service" name="work_govt_service[]" type="text"  value= "" style="text-transform: uppercase;">
                  </td>
                  <td>';
                    
            <tr>
              <td><input type= "date" class="form-control" id="work_date_from0" name="work_date_from[]"></td>
              <td><input type= "date" class="form-control" id="work_date_to0" name="work_date_to[]"></td>
              <td><input type= "text" class="form-control" id="work_position_title0" name="work_position_title[]" style="text-transform: uppercase;"></td>
              <td><input type= "text" class="form-control" id="work_department0" name="work_department[]" style="text-transform: uppercase;"></td>
              <td><input type= "number" class="form-control" id="work_monthly_salary0" name="work_monthly_salary[]" type="text"></td>
              <td><input type= "text" class="form-control" id="work_salary_grade0" name="work_salary_grade[]" style="text-transform: uppercase;"></td>
              <td><input type= "text" class="form-control" id="work_status_of_appointment0" name="work_status_of_appointment[]" style="text-transform: uppercase;" ></td>
              <td><input type= "text" class="form-control" id="work_govt_service0" name="work_govt_service[]" style="text-transform: uppercase;"></td>
              <td width='%' class='td-bold-text td-row-h'><a href='#' class='AddWork'><center><i class='fa fa-plus-square fa-fw'>  </center></i></a></td>													
            </tr>
           
          
            <tr>														
              <td width='%' class='td-bold-text td-row-h'>
                <input type='hidden' id='txtCountWork' name='txtCountWork' readonly='true' value=''/>
              </td>					
            </tr>
          </tbody>
        </table>
      </div>
    
    
    </div>
    <div class="box-footer">											
      <button type="submit" name="submit_work" id="submit_work" class="btn btn-primary pull-right">Save</button>
    </div>	
  </div>
  </form>