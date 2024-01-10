<form method = "POST" action = "save_educational_background.php" enctype="multipart/form-data">	
  <input type="hidden" name="empnoeb" class="form-control"  value = "">
  <!-- elementary -->
  <div class="box box-primary">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Elementary</a></h4>
    </div>
    
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="elementary_name_school">Name of Schools</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="elementary_name_school" name="elementary_name_school" style="text-transform: uppercase;" type="text" value="" >
          </div>
        </div>
      </div>
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="elementary_degree_course">Basic Education/Degree/Course</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="elementary_degree_course" name="elementary_degree_course" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="elementary_date_attendance_from">From</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="elementary_date_attendance_from" name="elementary_date_attendance_from" type="text" value= "">												
          </div>
          
          <div class="col-md-2">
            <label for="elementary_date_attendance_to">To</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="elementary_date_attendance_to" name="elementary_date_attendance_to" type="text" value= "">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="elementary_year_graduated1">Year Graudated:</label>								
          </div>										
          <div class="col-md-4">													
            <select class="form-control" name="elementary_year_graduated1" id="elementary_year_graduated1" >
              <option value=''>SELECT ONE</option>
                
            </select>																							
          </div>			
        </div>
      </div>

      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="elementary_highest_grade" 100%>Highest Level Attained:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="elementary_highest_grade" name="elementary_highest_grade" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>


      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label>Scholarship/Academic Honors Recieved:</label>								
          </div>										
          <div class="col-md-10">
            <input  class="form-control" id="elementary_scholarship" name="elementary_scholarship" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>							
    </div>

  </div>
  
  <!-- secondary -->
  <div class="box box-info">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Secondary</a></h4>
    </div>
    <div class="box-body">
    
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_name_school">Name of Schools</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="secondary_name_school" name="secondary_name_school" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_degree_course">Basic Education/Degree/Course</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="secondary_degree_course" name="secondary_degree_course" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_date_attendance_from">From</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="secondary_date_attendance_from" name="secondary_date_attendance_from" type="text" value= "">												
          </div>
          
          <div class="col-md-2">
            <label for="secondary_date_attendance_to">To</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="secondary_date_attendance_to" name="secondary_date_attendance_to" type="text" value= "">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_year_graduated">Year Graudated:</label>								
          </div>										
          <div class="col-md-4">
            <select class="form-control" name="secondary_year_graduated" id="secondary_year_graduated" >
              <option value=''>SELECT ONE</option>
                
            </select>														
          </div>			
        </div>
      </div>

      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_highest_grade">Highest Level Attained:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="secondary_highest_grade" name="secondary_highest_grade" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>


      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="secondary_scholarship">Scholarship/Academic Honors Recieved:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="secondary_scholarship" name="secondary_scholarship" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>		
    </div>
  </div>
  
  <!-- vocational -->
  <div class="box box-success">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Vocational / Trade Course </a></h4>
    </div>
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_name_school">Name of Schools</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="vocational_name_school" name="vocational_name_school" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_degree_course">Basic Education/Degree/Course</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="vocational_degree_course" name="vocational_degree_course" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_date_attendance_from">From</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="vocational_date_attendance_from" name="vocational_date_attendance_from" type="text" value= "">												
          </div>
          
          <div class="col-md-2">
            <label for="vocational_date_attendance_to">To</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="vocational_date_attendance_to" name="vocational_date_attendance_to" type="text" value= "">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_year_graduated">Year Graudated:</label>								
          </div>										
          <div class="col-md-4">
            <select class="form-control" name="vocational_year_graduated" id="vocational_year_graduated" >
              <option value='0000' selected>SELECT ONE</option>
                
            </select>												
          </div>			
        </div>
      </div>

      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_highest_grade">Highest Level Attained:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="vocational_highest_grade" name="vocational_highest_grade" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>


      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="vocational_scholarship">Scholarship/Academic Honors Recieved:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="vocational_scholarship" name="vocational_scholarship" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>										
  
    </div>
  </div>
  
  <!-- college -->
  <div class="box box-warning">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">College </a></h4>
    </div>
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_name_school">Name of Schools</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="college_name_school" name="college_name_school" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_degree_course">Basic Education/Degree/Course</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="college_degree_course" name="college_degree_course" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
    
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_date_attendance_from">From</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="college_date_attendance_from" name="college_date_attendance_from" type="text" value= "">												
          </div>
          
          <div class="col-md-2">
            <label for="college_date_attendance_to">To</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="college_date_attendance_to" name="college_date_attendance_to" type="text" value= "">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_year_graduated">Year Graudated:</label>								
          </div>										
          <div class="col-md-4">
            <select class="form-control" name="college_year_graduated" id="college_year_graduated" >
              <option value='0000' selected>SELECT ONE</option>
                
            </select>												
          </div>			
        </div>
      </div>

      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_highest_grade">Highest Level Attained:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="college_highest_grade" name="college_highest_grade" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>


      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="college_scholarship">Scholarship/Academic Honors Recieved:</label>								
          </div>										
          <div class="col-md-10">
            <input type= "text" class="form-control" id="college_scholarship" name="college_scholarship" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>										
  
    </div>
  </div>
  
  <!-- graduate -->
  <div class="box box-danger">
    <div class="box-header with-border">									
      <h4 class="timeline-header"><a href="#">Gradaute Studies </a></h4>
    </div>
    <div class="box-body">
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_name_school">Name of Schools</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="graduate_name_school" name="graduate_name_school" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
      
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_degree_course">Basic Education/Degree/Course</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="graduate_degree_course" name="graduate_degree_course" type="text" value= "" style="text-transform: uppercase;">
          </div>
        </div>
      </div>
  
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_date_attendance_from">From</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="graduate_date_attendance_from" name="graduate_date_attendance_from" type="text" value= "">												
          </div>
          
          <div class="col-md-2">
            <label for="graduate_date_attendance_to">To</label>								
          </div>										
          <div class="col-md-4">
            <input type= "date" class="form-control" id="graduate_date_attendance_to" name="graduate_date_attendance_to" type="text" value= "">
          </div>
        </div>
      </div>
      
      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_year_graduated">Year Graudated:</label>								
          </div>										
          <div class="col-md-4">
            <select class="form-control" name="graduate_year_graduated" id="graduate_year_graduated" >
              <option value='0000' selected>SELECT ONE</option>
                
            </select>														
          </div>			
        </div>
      </div>

      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_highest_grade">Highest Level Attained:</label>								
          </div>										
          <div class="col-md-10">
            <input class="form-control" id="graduate_highest_grade" name="graduate_highest_grade" type="text" value= "" style="text-transform: uppercase;">												
          </div>			
        </div>
      </div>


      <div class="form-group" style="width: 100%; float:left">
        <div class="row" style="padding-top: 8px">
          <div class="col-md-2">
            <label for="graduate_scholarship">Scholarship/Academic Honors Recieved:</label>								
          </div>										
          <div class="col-md-10">
            <input type= "text" class="form-control" id="graduate_scholarship" name="graduate_scholarship" type="text" value= "" style="text-transform: uppercase;"> 												
          </div>			
        </div>
      </div>						
    </div>
    
    <div class="box-footer">
      <button type="submit" name="submit_educational" id="submit_educational" class="btn btn-primary pull-right">Save</button>							

    </div>										
  </div>
  
  
  </form>