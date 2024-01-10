<form method = "POST" action = "save_civil_service.php" enctype="multipart/form-data">	
  <input type="hidden" name="empnocs" class="form-control"  value = "">
  <div class="box box-primary">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Civil Service Eligibilty</a></h4>
    </div>
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <table  class="table table-bordered" id="tblCS">
          <thead  >
            <th width = "25%">Career Service / RA 1080</th>
            <th width = "10%">Rating</th>
            <th width = "15%">Date of Examination</th>
            <th width = "20%">Place of Examination / Conferment </th>
            <th width = "10%">License No.</th>
            <th width = "15%">Date of Validity</th>
            <th width = "5%"></th>
          </thead>      
          <tbody>
            <tr>
                    <td><input class="form-control" id="civil_career_service" name="civil_career_service[]" type="text" value= "" style="text-transform: uppercase;"></td>
                    <td><input type= "text" class="form-control" id="civil_rating" name="civil_rating[]" type="text" value= ""></td>
                    <td><input type= "date" class="form-control" id="civil_date_of_examination" name="civil_date_of_examination[]" type="text" value= ""></td>
                    <td><input class="form-control" id="civil_place_of_examination" name="civil_place_of_examination[]" type="text" value= "" style="text-transform: uppercase;"></td>
                    <td><input type= "number" class="form-control" id="civil_license_number" name="civil_license_number[]" type="text" value= ""></td>
                    <td><input type= "date" class="form-control" id="civil_date_of_validity" name="civil_date_of_validity[]" type="text" value= ""></td>
                    <td>
                      
            <tr>
              <td>
                <input class="form-control" id="civil_career_service0" name="civil_career_service[]" type="text" value= "" style="text-transform: uppercase;">
              </td>
              <td>
                <input type= "text" class="form-control" id="civil_rating0" name="civil_rating[]"  value= "">
              </td>
              <td>
                <input type= "date" class="form-control" id="civil_date_of_examination0" name="civil_date_of_examination[]">
              </td>
              <td>
                <input class="form-control" id="civil_place_of_examination0" name="civil_place_of_examination[]" type="text" value= "" style="text-transform: uppercase;">
              </td>
              <td>
                <input type= "number" class="form-control" id="civil_license_number0" name="civil_license_number[]"  value= "">
              </td>
              <td>
                <input type= "date" class="form-control" id="civil_date_of_validity0" name="civil_date_of_validity[]">
              </td>
              <td width='%' class='td-bold-text td-row-h'>
                <a href='#' class='AddEligibility'><center><i class='fa fa-plus-square fa-fw'>  </center></i></a>
              </td>													
            </tr>
            
            <tr>
              <td width='%' class='td-bold-text td-row-h'>
                <input type='hidden' id='txtCountCS' name='txtCountCS' readonly='true' value=''/>
              </td>					
            </tr>
          </tbody>
        </table>
      </div>
    
    </div>
    <div class="box-footer">											
      <button type="submit" name="submit_civil" id="submit_civil" class="btn btn-primary pull-right">Save</button>
    </div>	
  </div>
  </form>