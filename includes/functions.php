 <?php
// include 'conn_to_ctris.php';
require_once('init.php');

// LIST OF POSITIONS
if(isset($_POST["list_position_id"])){ 
  $list_position_id = $_POST["list_position_id"];
  $params['fields'] = "position_code, position_name";
  $params['order'] = 'position_name';
  $update_positions=$dbConn->find('lib_position',$params);
  $update_positions_output = '<option value="">SELECT POSITION</option>';
  if($update_positions){
    foreach($update_positions as $update_position){
      $update_positions_output .= '<option value='.$update_position['position_code']. ($list_position_id==$update_position['position_code']?" selected":"") . ' >' .$update_position['position_name'].'</option>';
    }
  }
  echo $update_positions_output; 
}
// LIST OF DIVISION
if(isset($_POST["list_division_id"])){ 
  $list_division_id = $_POST["list_division_id"];
  $params['fields'] = "division_code, division_name";
  $params["order"] = "division_name";
  $params['multipleconditions']["division_status"] =  ['!=',3];
  $update_divisions=$dbConn->find('lib_division',$params);
  $update_divisions_output = '<option value="">SELECT DIVISION</option>';
  if($update_divisions){
    foreach($update_divisions as $update_division){
      $update_divisions_output .= '<option value='.$update_division['division_code']. ($list_division_id==$update_division['division_code']?" selected":"") . ' >' .$update_division['division_name'].'</option>';
    }
  }
  echo $update_divisions_output; 
}
// LIST OF UNIT
if(isset($_POST["list_unit_id"])&& isset($_POST['Where_division_ID'])){ 
  $list_unit_id = $_POST["list_unit_id"];
  $Where_division_ID = $_POST["Where_division_ID"];
  $params['fields'] = "unit_code, unit_name";
  $params['multipleconditions']["unit_status"] =  ['!=',3];
  $params['multipleconditions']["division_code"] =  ['=',$Where_division_ID];
  $params['order'] = 'unit_name';
  $update_units=$dbConn->find('lib_unit',$params);
  $update_units_output = '<option value="">SELECT UNIT</option>';
  if($update_units){
    foreach($update_units as $update_unit){
      $update_units_output .= '<option value='.$update_unit['unit_code']. ($list_unit_id==$update_unit['unit_code']?" selected":"") . ' >' .$update_unit['unit_name'].'</option>';
    }
  }
  echo $update_units_output; 
}

// LIST OF AREA ASSIGNMENT
if(isset($_POST["list_assignment_id"])&& isset($_POST['Where_unit_ID'])){ 
  $list_assignment_id = $_POST["list_assignment_id"];
  $Where_unit_ID = $_POST["Where_unit_ID"];
  $params['fields'] = "area_assignment_code, area_assignment_name";
  $params['multipleconditions']["area_assignment_status"] =  ['!=',3];
  $params['multipleconditions']["unit_code"] =  ['=',$Where_unit_ID];
  $params['order'] = 'area_assignment_name';
  $update_assignments=$dbConn->find('lib_area_assignment',$params);
  $update_assignments_output = '<option value="">SELECT AREA OF ASSIGNMENT</option>';
  if($update_assignments){
    foreach($update_assignments as $update_assignment){
      $update_assignments_output .= '<option value='.$update_assignment['area_assignment_code']. ($list_assignment_id==$update_assignment['area_assignment_code']?" selected":"") . ' >' .$update_assignment['area_assignment_name'].'</option>';
    }
  }
  echo $update_assignments_output; 
}

// LIST OF OFFICIAL STATION
if(isset($_POST["list_official_station_id"])){ 
  $list_official_station_id = $_POST["list_official_station_id"];
  $params['fields'] = "station_code, station_name";
  $params["order"] = "station_name";
  $params['multipleconditions']["official_station_status"] =  ['!=',3];
  $update_official_stations=$dbConn->find('lib_official_station',$params);
  $update_official_stations_output = '<option value="">SELECT OFFICIAL STATION</option>';
  if($update_official_stations){
    foreach($update_official_stations as $update_official_station){
      $update_official_stations_output .= '<option value='.$update_official_station['station_code']. ($list_official_station_id==$update_official_station['station_code']?" selected":"") . ' >' .$update_official_station['station_name'].'</option>';
    }
  }
  echo $update_official_stations_output; 
}
// LIST OF POSITION NAME
if(isset($_POST["list_position_name"])){ 
  $position_name_id = $_POST["list_position_name"];
  $params['fields'] = "position_name_id, position_name";
  $params["order"] = "position_name";
  $params['multipleconditions']["status"] =  ['!=',3];
  $position_names=$dbConn->find('lib_position_name',$params);
  $position_names_output = '<option value="">SELECT POSITION NAME</option>';
  if($position_names){
    foreach($position_names as $position_name){
      $position_names_output .= '<option value='.$position_name['position_name_id']. ($position_name_id==$position_name['position_name_id']?" selected":"") . ' >' .$position_name['position_name'].'</option>';
    }
  }
  echo $position_names_output; 
}
// LIST OF EMPLOYMENT STATUS
if(isset($_POST["list_class_employment"])){ 
  $class_employment_id = $_POST["list_class_employment"];
  $params['fields'] = "position_classification_id, classification_employment_name";
  $params["order"] = "classification_employment_name";
  $params['multipleconditions']["classification_employment_status"] =  ['!=',3];
  $class_employments=$dbConn->find('lib_classification_employment',$params);
  $class_employment_output = '<option value="">SELECT EMPLOYMENT STATUS</option>';
  if($class_employments){
    foreach($class_employments as $class_employment){
      $class_employment_output .= '<option value='.$class_employment['position_classification_id']. ($class_employment_id==$class_employment['position_classification_id']?" selected":"") . ' >' .$class_employment['classification_employment_name'].'</option>';
    }
  }
  echo $class_employment_output; 
}

// LIST OF SALARY GRADE
if(isset($_POST["list_salary_grade"])){ 
  $salary_grade_id = $_POST["list_salary_grade"];
  $params['fields'] = "id, grade";
  $params["order"] = "grade";
  $params['multipleconditions']["salary_status"] =  ['!=',3];
  $params['multipleconditions']["increment"] =  ['=',1];
  $salary_grades=$dbConn->find('lib_salary',$params);
  $salary_grades_output = '<option value="">SELECT SALARY GRADE</option>';
  if($salary_grades){
    foreach($salary_grades as $salary_grade){
      $salary_grades_output .= '<option value='.$salary_grade['id']. ($salary_grade_id==$salary_grade['id']?" selected":"") . ' >' .$salary_grade['grade'].'</option>';
    }
  }
  echo $salary_grades_output; 
}
// LIST OF FUND SOURCE
if(isset($_POST["list_fund_source"])){ 
  $fund_source_id = $_POST["list_fund_source"];
  $params['fields'] = "fund_source_code, fund_source_name";
  $params["order"] = "fund_source_name";
  $params['multipleconditions']["status"] =  ['!=',3];
  $fund_sources=$dbConn->find('lib_fund_source',$params);
  $fund_sources_output = '<option value="">SELECT FUND SOURCE</option>';
  if($fund_sources){
    foreach($fund_sources as $fund_source){
      $fund_sources_output .= '<option value='.$fund_source['fund_source_code']. ($fund_source_id==$fund_source['fund_source_code']?" selected":"") . ' >' .$fund_source['fund_source_name'].'</option>';
    }
  }
  echo $fund_sources_output; 
}

// LIST OF MODE SEPERATION
if(isset($_POST["list_mode_seperation"])){ 
  $mode_seperation_id = $_POST["list_mode_seperation"];
  $params['fields'] = "mode_seperation_id, mode_seperation_description";
  $params["order"] = "mode_seperation_description";
  $params['multipleconditions']["mode_seperation_status"] =  ['!=',3];
  $mode_seperations=$dbConn->find('lib_mode_seperation',$params);
  $mode_seperations_output = '<option value="">SELECT MODE OF SEPERATION</option>';
  if($mode_seperations){
    foreach($mode_seperations as $mode_seperation){
      $mode_seperations_output .= '<option value='.$mode_seperation['mode_seperation_id']. ($mode_seperation_id==$mode_seperation['mode_seperation_id']?" selected":"") . ' >' .$mode_seperation['mode_seperation_description'].'</option>';
    }
  }
  echo $mode_seperations_output; 
}

// LIST OF UNFILLED ITEM CODE
if(isset($_POST["list_unfilled_item_code"])){ 
  $unfilled_item_code_id = $_POST["list_unfilled_item_code"];
  $sql = "SELECT pos.position_id, pos.item_code, pn.position_name
  FROM lib_position pos
  LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
  WHERE pos.position_status = '0'
  ORDER BY pos.item_code
";
  $unfilled_item_codes=$dbConn->findQuery($sql);
  $unfilled_item_codes_output = '<option value="">SELECT UNFILLED POSITION</option>';
  if($unfilled_item_codes){
    foreach($unfilled_item_codes as $unfilled_item_code){
      $unfilled_item_codes_output .= '<option value='.$unfilled_item_code['position_id']. ($unfilled_item_code_id==$unfilled_item_code['position_id']?" selected":"") . ' >' .$unfilled_item_code['item_code'].' - '.$unfilled_item_code['position_name'].'</option>';
    }
  }
  echo $unfilled_item_codes_output; 
}
// LIST OF REGION
if(isset($_POST["list_region"])){ 
  $list_region_id = $_POST["list_region"];
  $params['fields'] = "region_code, region_name";
  $list_regions=$dbConn->find('lib_regions',$params);
  $list_regions_output = '<option value="">SELECT REGION</option>';
  if($list_regions){
    foreach($list_regions as $list_region){
      $list_regions_output .= '<option value='.$list_region['region_code']. ($list_region_id==$list_region['region_code']?" selected":"") . ' >' .$list_region['region_name'].'</option>';
    }
  }
  echo $list_regions_output; 
}
// LIST OF PROVICE
if(isset($_POST["list_province"])&& isset($_POST['Where_region_ID'])){
  $list_province_id = $_POST["list_province"];
  $Where_region_id = $_POST["Where_region_ID"];
  $params['fields'] = "prov_code, prov_name";
  $params['conditions'] = array("region_code" => $Where_region_id);
  $params['order'] = 'prov_name';
  $list_provinces=$dbConn->find('lib_provinces',$params);
  $list_provinces_output = '<option value="">SELECT PROVINCE</option>';
  if($list_provinces){
    foreach($list_provinces as $list_province){
      $list_provinces_output .= '<option value='.$list_province['prov_code']. ($list_province_id==$list_province['prov_code']?" selected":"") . ' >' .$list_province['prov_name'].'</option>';
      
    }
  }
  echo $list_provinces_output; 
}
// LIST OF CITY
if(isset($_POST["list_city"])&& isset($_POST['Where_province_ID'])){  
  $list_city_id = $_POST["list_city"];
  $Where_province_ID = $_POST["Where_province_ID"];
  $params['fields'] = "city_code, city_name";
  $params['conditions'] = array("prov_code" => $Where_province_ID);
  $params['order'] = 'city_name';
  $list_cities=$dbConn->find('lib_cities',$params);
  $list_cities_output = '<option value="">SELECT CITY/MUNICIPALITY</option>';
  if($list_cities){
    foreach($list_cities as $list_city){
      $list_cities_output .= '<option value='.$list_city['city_code']. ($list_city_id==$list_city['city_code']?" selected":"") . ' >' .$list_city['city_name'].'</option>';
      
    }
  }
  echo $list_cities_output; 
}
// LIST OF CITY
if(isset($_POST["list_brgy"])&& isset($_POST['Where_city_ID'])){  
  $list_brgy_id = $_POST["list_brgy"];
  $Where_city_ID = $_POST["Where_city_ID"];
  $params['fields'] = "brgy_code, brgy_name";
  $params['conditions'] = array("city_code" => $Where_city_ID);
  $params['order'] = 'brgy_name';
  $list_brgys=$dbConn->find('lib_brgy',$params);
  $list_brgys_output = '<option value="">SELECT BARANGAY</option>';
  if($list_brgys){
    foreach($list_brgys as $list_brgy){
      $list_brgys_output .= '<option value='.$list_brgy['brgy_code']. ($list_brgy_id==$list_brgy['brgy_code']?" selected":"") . ' >' .$list_brgy['brgy_name'].'</option>';
      
    }
  }
  echo $list_brgys_output; 
}



function fill_cluster($dbConn,$cluster_id=0){ //Drop down ning Cluster
  $params['fields'] = "cluster_code, cluster_name";
  $cluster=$dbConn->find('lib_cluster',$params);
  $output = '<option value="">SELECT CLUSTER</option>';
  if($cluster){
    foreach($cluster as $cluster){
      $output .= '<option value='.$cluster['cluster_code']. ($cluster_id==$cluster['cluster_code']?" selected":"") . ' >' .$cluster['cluster_name'].'</option>';
    }
  }
 return $output;
}
function fill_region($dbConn,$region_id=0){ //Drop down ning Region
    $params['fields'] = "region_code, region_name, region_nick";
    $regions=$dbConn->find('lib_regions',$params);
    $output = '<option value="">SELECT REGION</option>';
    if($regions){
      foreach($regions as $region){
        $output .= '<option value='.$region['region_code']. ($region_id==$region['region_code']?" selected":"") . ' >' .$region['region_name'].'</option>';
      }
    }
   return $output;
}
function fill_position($dbConn,$position_id=0){
  // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
  $params['fields'] = "position_code, position_name";
  $params['group'] = "position_code, position_name";
  $params['order'] = "position_name";
  $positions=$dbConn->find('lib_position',$params);
  $output = '<option value="">SELECT POSITION</option>';
  if($positions){
    foreach($positions as $position){
      $output .= '<option value='.$position['position_code']. ($position_id==$position['position_code']?" selected":"") . ' >' .$position['position_name'].'</option>';
    }
  }
 return $output;
}
if(isset($_POST["regionAction"])){ //Kapag Onchange ning region
  $region_code = $_POST["region_id"];
  $params['fields'] = "prov_code, prov_name";
  $params['conditions'] = array("region_code" => $region_code);
  $params['order'] = "prov_name";
  $provinces=$dbConn->find('lib_provinces',$params);
  $province_output = '<option value="">SELECT PROVINCE</option>';
  if($provinces){
    foreach($provinces as $province){
      $province_output .= '<option value='.$province['prov_code'] . ' >' .$province['prov_name'].'</option>';
    }
  }
  echo $province_output;
}
if(isset($_POST["provinceAction"])){ //Kapag Onchange ning province
  $province_code = $_POST["province_id"];
  $params['fields'] = "city_code, city_name";
  $params['conditions'] = array("prov_code" => $province_code);
  $params['order'] = "city_name";
  $cities=$dbConn->find('lib_cities',$params);
  $city_output = '<option value="">SELECT MUNICIPALITY</option>';
  if($cities){
    foreach($cities as $city){
      $city_output .= '<option value='.$city['city_code'] . ' >' .$city['city_name'].'</option>';
    }
  }
  echo $city_output; 
}
if(isset($_POST["cityAction"])){ //Kapag Onchange ning city
  $city_code = $_POST["city_id"];
  $params['fields'] = "brgy_code, brgy_name";
  $params['conditions'] = array("city_code" => $city_code);
  $params['order'] = "brgy_name";
  $brgys=$dbConn->find('lib_brgy',$params);
  $brgy_output = '<option value="">SELECT BARANGAY</option>';
  if($brgys){
    foreach($brgys as $brgy){
      $brgy_output .= '<option value='.$brgy['brgy_code'] . ' >' .$brgy['brgy_name'].'</option>';
    }
  }
  echo $brgy_output; 
}


function fill_position_name($dbConn,$position_name_id=0){ //dropdown for position
  $params['fields'] = "position_name_id, position_name, position_initial";
  $params['group'] = "position_name_id, position_name, position_initial";
  $params['order'] = "position_name";
  $params['conditions'] = array('status'=>'0');
  $positionNames=$dbConn->find('lib_position_name',$params);
  $output = '<option value="">SELECT POSITION NAME</option>';
  if($positionNames){
    foreach($positionNames as $positionName){
      $output .= '<option value='.$positionName['position_name_id']. ($position_name_id==$positionName['position_name_id']?" selected":"") . ' >' .$positionName['position_name'].'</option>';
    }
  }
 return $output;
}
function fill_item_code($dbConn,$item_id=0){ //dropdown for position
  $sql = "SELECT pos.position_id, pos.item_code, pn.position_name
          FROM lib_position pos
          LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
          WHERE pos.position_status = '0'
          ORDER BY pos.item_code
  ";
  $item_codes=$dbConn->findQuery($sql);
  $output = '<option value="">SELECT ITEM CODE</option>';
  if($item_codes){
    foreach($item_codes as $item_code){
      $output .= '<option value='.$item_code['position_id']. ($item_id==$item_code['position_id']?" selected":"") . ' >' .$item_code['item_code'].' - '.$item_code['position_name'].'</option>';
    }
  }
 return $output;
}
function fill_mode_seperation($dbConn,$seperation_id=0){ //dropdown for mode of seperation
  $params['fields'] = "mode_seperation_id, mode_seperation_description";
  $params['group'] = "mode_seperation_id, mode_seperation_description";
  $params['order'] = "mode_seperation_description";
  $mode_seperations=$dbConn->find('lib_mode_seperation',$params);
  $output = '<option value="">SELECT ONE</option>';
  if($mode_seperations){
    foreach($mode_seperations as $mode_seperation){
      $output .= '<option value='.$mode_seperation['mode_seperation_id']. ($seperation_id==$mode_seperation['mode_seperation_id']?" selected":"") . ' >' .$mode_seperation['mode_seperation_description'].'</option>';
    }
  }
 return $output;
}
function fill_blood_type($dbConn,$blood_type_id=0){ //dropdown for mode of seperation
  $params['fields'] = "blood_type_id, blood_type_description";
  $params['group'] = "blood_type_id, blood_type_description";
  $params['order'] = "blood_type_id";
  $blood_types=$dbConn->find('lib_blood_types',$params);
  $output = '<option value="">SELECT BLOOD TYPE</option>';
  if($blood_types){
    foreach($blood_types as $blood_type){
      $output .= '<option value='.$blood_type['blood_type_id']. ($blood_type_id==$blood_type['blood_type_id']?" selected":"") . ' >' .$blood_type['blood_type_description'].'</option>';
    }
  }
 return $output;
}
function fill_employee($dbConn,$emp_id=0){ //dropdown for employee
  $params['fields'] = "empno, fname, mname, sname, ename";
  $params['group'] = "empno, fname, mname, sname, ename";
  $params['order'] = "fname";
  $empDetails=$dbConn->find('userprofile',$params);
  $output = '<option value="">SELECT EMPLOYEE</option>';
  if($empDetails){
    foreach($empDetails as $empDetail){
      $output .= '<option value='.$empDetail['empno']. ($emp_id==$empDetail['empno']?" selected":"") . ' >' .$empDetail['empno'].' - '.$empDetail['fname'].' '.$empDetail['mname'].' '.$empDetail['sname'].' '.$empDetail['ename'].'</option>';
    }
  }
 return $output;
}
function fill_division($dbConn,$division_id=0){ //dropdown for division
  // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
  $params['fields'] = "division_code, division_name, division_name_code";
  $params['group'] = "division_code, division_name, division_name_code";
  $params["order"] = "division_name";
  $divisions=$dbConn->find('lib_division',$params);
  $output = '<option value="">SELECT DIVISION</option>';
  if($divisions){
    foreach($divisions as $division){
      $output .= '<option value='.$division['division_code']. ($division_id==$division['division_code']?" selected":"") . ' >' .$division['division_name'].'</option>';
    }
  }
 return $output;
}
function fill_unit($dbConn,$unit_id=0){ //dropdown for division
  // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
  $params['fields'] = "unit_code, unit_name";
  $params['group'] = "unit_code, unit_name";
  $params["order"] = "unit_name";
  $params['multipleconditions']["unit_status"] =  ['!=',3];
  $units=$dbConn->find('lib_unit',$params);
  $output = '<option value="">SELECT AREA OF ASSIGNMENT</option>';
  if($units){
    foreach($units as $unit){
      $output .= '<option value='.$unit['unit_code']. ($unit_id==$unit['unit_code']?" selected":"") . ' >' .$unit['unit_name'].'</option>';
    }
  }
 return $output;
}
function fill_employment($dbConn,$employment_id=0){ //dropdown for classification of employment
  $params['fields'] = "position_classification_id, classification_employment_name";
  $params['group'] = "position_classification_id, classification_employment_name";
  $params["order"] = "classification_employment_name";
  $employments=$dbConn->find('lib_classification_employment',$params);
  $output = '<option value="">SELECT EMPLOYMENT STATUS</option>';
  if($employments){
    foreach($employments as $employment){
      $output .= '<option value='.$employment['position_classification_id']. ($employment_id==$employment['position_classification_id']?" selected":"") . ' >' .$employment['classification_employment_name'].'</option>';
    }
  }
 return $output;
}
function fill_salary_grade($dbConn,$sg_id=0){ //dropdown for classification of employment
  $params['fields'] = "id, grade";
  $params['group'] = "id, grade";
  $params["order"] = "grade";
  $params["conditions"] = array('increment' => '1');
  $SGS=$dbConn->find('lib_salary',$params);
  $output = '<option value="">SELECT SALARY GRADE</option>';
  if($SGS){
    foreach($SGS as $SG){
      $output .= '<option value='.$SG['id']. ($sg_id==$SG['id']?" selected":"") . ' >' .$SG['grade'].'</option>';
    }
  }
 return $output;
}
function fill_fund_source($dbConn,$fs_id=0){ //dropdown for classification of employment
  $params['fields'] = "fund_source_code, fund_source_name";
  $params['group'] = "fund_source_code, fund_source_name";
  $params["order"] = "fund_source_name";
  $params["conditions"] = array('status' => '0');
  $fund_sources=$dbConn->find('lib_fund_source',$params);
  $output = '<option value="">SELECT FUND SOURCE</option>';
  if($fund_sources){
    foreach($fund_sources as $fund_source){
      $output .= '<option value='.$fund_source['fund_source_code']. ($fs_id==$fund_source['fund_source_code']?" selected":"") . ' >' .$fund_source['fund_source_name'].'</option>';
    }
  }
 return $output;
}
//Information when old employee
if(isset($_POST["sessionEmpno"])){ //retrieve data from database based on the logged in user account
  $empNO = $_POST["sessionEmpno"];
  $params = array($empNO);
  $sql = 
  "SELECT up.empno, up.position_id, pos.item_code, up.date_filled, up.sname, up.mname, up.fname, up.ename, up.sex, up.mobile, up.eaddress, up.birthdate, up.street, up.numAdd,
up.region, up.city, up.province, up.barangay, up.uploaded_id, pn.position_name, las.area_assignment_code, las.area_assignment_name, un.unit_code, un.unit_name, un.division_code, d.division_name, up.user_level,
  IFNULL(r.region_name,'') AS region_name, IFNULL(prov.prov_name,'') AS prov_name, 
  IFNULL(muni.city_name,'') AS city_name, IFNULL(brgy.brgy_name,'') AS brgy_name, up.account_status
FROM userprofile up
LEFT JOIN lib_position pos ON pos.position_id = up.position_id
LEFT JOIN lib_position_name pn ON pn.position_name_id = pos.position_name_id
LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
LEFT JOIN lib_unit un ON un.unit_code = las.unit_code
LEFT JOIN lib_division d ON un.division_code = d.division_code
LEFT JOIN lib_regions r on r.region_code = up.region
LEFT JOIN lib_provinces prov on prov.prov_code = up.province
LEFT JOIN lib_cities muni on muni.city_code = up.city
LEFT JOIN lib_brgy brgy on brgy.brgy_code = up.barangay 
  WHERE up.empno = ?
  ";
  $UpdateInfo=$dbConn->findFirstQuery($sql,$params);
  echo json_encode($UpdateInfo); 
}
if(isset($_POST["divisionAction"])){ //ONCHANGE Drop down menu for UNIT
  $division_code = $_POST["division_ids"];
  $params['fields'] = "unit_code, unit_name";
  $params['multipleconditions']["unit_status"] =  ['!=',3];
  $params['multipleconditions']["division_code"] =  ['=',$division_code];
  $params["order"] = "unit_name";
  $units=$dbConn->find('lib_unit',$params);
  $units_output = '<option value="">SELECT UNIT</option>';
  if($units){
    foreach($units as $unit){
      $units_output .= '<option value='.$unit['unit_code'] . ' >' .$unit['unit_name'].'</option>';
    }
  }
  echo $units_output; 
}

if(isset($_POST["update_region_id"])){ //retrieve data of selected region from lib_regions
  $update_region_id = $_POST["update_region_id"];
  $params['fields'] = "region_code, region_name";
  // $params['conditions'] = array("region_code" => $update_region);
  $update_regions=$dbConn->find('lib_regions',$params);
  $update_regions_output = '<option value="">SELECT REGION</option>';
  if($update_regions){
    foreach($update_regions as $update_region){
      $update_regions_output .= '<option value='.$update_region['region_code']. ($update_region_id==$update_region['region_code']?" selected":"") . ' >' .$update_region['region_name'].'</option>';
      
    }
  }
  echo $update_regions_output; 
}
if(isset($_POST["update_province_id"])&& isset($_POST['Where_region_ID'])){ //retrieve data of province with region id, auto populated province
  $update_province_id = $_POST["update_province_id"];
  $Where_region_id = $_POST["Where_region_ID"];
  $params['fields'] = "prov_code, prov_name";
  $params['conditions'] = array("region_code" => $Where_region_id);
  $params['order'] = 'prov_name';
  $update_provinces=$dbConn->find('lib_provinces',$params);
  $update_provinces_output = '<option value="">SELECT PROVINCE</option>';
  if($update_provinces){
    foreach($update_provinces as $update_province){
      $update_provinces_output .= '<option value='.$update_province['prov_code']. ($update_province_id==$update_province['prov_code']?" selected":"") . ' >' .$update_province['prov_name'].'</option>';
      
    }
  }
  echo $update_provinces_output; 
}
if(isset($_POST["update_city_id"])&& isset($_POST['Where_province_ID'])){ //retrieve data of city with province id, auto populated city
  $update_city_id = $_POST["update_city_id"];
  $Where_province_id = $_POST["Where_province_ID"];
  $params['fields'] = "city_code, city_name";
  $params['conditions'] = array("prov_code" => $Where_province_id);
  $params['order'] = 'city_name';
  $update_cities=$dbConn->find('lib_cities',$params);
  $update_city_output = '<option value="">SELECT MUNICIPALITY</option>';
  if($update_cities){
    foreach($update_cities as $update_city){
      $update_city_output .= '<option value='.$update_city['city_code']. ($update_city_id==$update_city['city_code']?" selected":"") . ' >' .$update_city['city_name'].'</option>';
    }
  }
  echo $update_city_output; 
}
if(isset($_POST["update_barangay_id"])&& isset($_POST['Where_city_ID'])){ //retrieve data of brgy with city id, auto populated brgy
  $update_barangay_id = $_POST["update_barangay_id"];
  $Where_city_id = $_POST["Where_city_ID"];
  $params['fields'] = "brgy_code, brgy_name";
  $params['conditions'] = array("city_code" => $Where_city_id);
  $params['order'] = 'brgy_name';
  $update_brgys=$dbConn->find('lib_brgy',$params);
  $update_brgys_output = '<option value="">SELECT BARANGAY</option>';
  if($update_brgys){
    foreach($update_brgys as $update_brgy){
      $update_brgys_output .= '<option value='.$update_brgy['brgy_code']. ($update_barangay_id==$update_brgy['brgy_code']?" selected":"") . ' >' .$update_brgy['brgy_name'].'</option>';
    }
  }
  echo $update_brgys_output; 
}

if(isset($_POST["UserLevel"])){ //retrieve data of user level from lib_user_level
  $UserLevel = $_POST["UserLevel"];
  $params['fields'] = "user_code, description";
  $user_levels=$dbConn->find('lib_user_level',$params);
  $user_level_output = '<option value="">SELECT USER LEVEL</option>';
  if($user_levels){
    foreach($user_levels as $user_level){
      $user_level_output .= '<option value='.$user_level['user_code']. ($UserLevel==$user_level['user_code']?" selected":"") . ' >' .$user_level['description'].'</option>';
      
    }
  }
  echo $user_level_output; 
}
if(isset($_POST["pob"])){ //retieved data of place of birth (Municipality) from lib_cities
  $update_pob_id = $_POST["pob"];
  $params['fields'] = "city_code, city_name";
  // $params['conditions'] = array("region_code" => $update_region);
  $update_pobs=$dbConn->find('lib_cities',$params);
  $update_pob_output = '<option value="">SELECT ONE</option>';
  if($update_pobs){
    foreach($update_pobs as $update_pob){
      $update_pob_output .= '<option value='.$update_pob['city_code']. ($update_pob_id==$update_pob['city_code']?" selected":"") . ' >' .$update_pob['city_name'].'</option>';
    }
  }
  echo $update_pob_output; 
}
if(isset($_POST["blood_type_id"])){ //retieved data of blood type from lib_blood_types
  $blood_type_id = $_POST["blood_type_id"];
  $params['fields'] = "blood_type_id, blood_type_description";
  $update_blood_types=$dbConn->find('lib_blood_types',$params);
  $update_update_blood_types_output = '<option value="">SELECT BLOOD TYPE</option>';
  if($update_blood_types){
    foreach($update_blood_types as $update_blood_type){
      $update_update_blood_types_output .= '<option value='.$update_blood_type['blood_type_id']. ($blood_type_id==$update_blood_type['blood_type_id']?" selected":"") . ' >' .$update_blood_type['blood_type_description'].'</option>';
      
    }
  }
  echo $update_update_blood_types_output; 
}
if(isset($_POST["citi_country"])){ //retrieve country information from lib_country
  $update_citi_country_id = $_POST["citi_country"];
  $params['fields'] = "id, iso3, nicename";
  $update_citi_countries=$dbConn->find('lib_country',$params);
  $update_citi_country_output = '<option value="">SELECT COUNTRY</option>';
  if($update_citi_countries){
    foreach($update_citi_countries as $update_citi_country){
      $update_citi_country_output .= '<option value='.$update_citi_country['id']. ($update_citi_country_id==$update_citi_country['id']?" selected":"") . ' >' .$update_citi_country['iso3'].' - '.$update_citi_country['nicename'].'</option>';
      
    }
  }
  echo $update_citi_country_output; 
}
if(isset($_POST["getFBid"])){ //retrieve family background information from lib_family_background
  $FBid = $_POST["getFBid"];
  $sql = "SELECT * FROM lib_family_background WHERE id = '$FBid'";
  $UpdateInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($UpdateInfo); 
}
if(isset($_POST["getAcads"])){ //retrieve academic information from lib_academic
  $Acadsid = $_POST["getAcads"];
  $sql = "SELECT a.*, ps.primary_school_id, ps.primary_school_title
          FROM lib_academic a
          LEFT JOIN lib_primary_school ps ON a.acad_school = ps.id 
          WHERE a.id = '$Acadsid'";
  $AcadsInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($AcadsInfo); 
}
if(isset($_POST["getPositionHistoryDetails"])){ //retrieve position details from lib_position and lib_position_name for history from tbl_employee_appointment_history
  $position_id = $_POST["getPositionHistoryDetails"];
  $sql = "SELECT pos.position_id, pos.item_code, pos.date_creation_position, pos.area_assignment, las.area_assignment_name, las.area_assignment_code, u.unit_code,d.division_code, pn.position_name, CONCAT(up.fname,' ',up.mname,' ',up.sname,' ',up.ename) as filled_by, up.date_filled
          FROM lib_position pos
          LEFT JOIN userprofile up ON up.position_id = pos.position_id
          LEFT JOIN lib_position_name pn ON pn.position_name_id = pos.position_name_id
          LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
          LEFT JOIN lib_unit u ON las.unit_code = u.unit_code
          LEFT JOIN lib_division d ON u.division_code = d.division_code
          WHERE pos.position_id = '$position_id'";
  $PosDetailsInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($PosDetailsInfo); 
}
if(isset($_POST["getPositionNameDetails"])){ //retrieve position name details from lib_position_name
  $PositionNameDetails = $_POST["getPositionNameDetails"];
  $params['conditions'] = array("position_name_id" => $PositionNameDetails);
  $PosNameDetailsInfo=$dbConn->findFirst('lib_position_name',$params);
  echo json_encode($PosNameDetailsInfo); 
}
if(isset($_POST["checkInUsedPositionName"])){ //check position name if used
  $PositionNameID = $_POST["checkInUsedPositionName"];
  $params['conditions'] = array("position_name_id" => $PositionNameID);
  $CheckInUsedPosName=$dbConn->findFirst('lib_position',$params);
  echo json_encode($CheckInUsedPosName); 
}
if(isset($_POST["checkInUsedPosition"])){ //check position name if used
  $PositionID = $_POST["checkInUsedPosition"];
  $params['conditions'] = array("position_id" => $PositionID);
  $dbConn->findFirst('userprofile',$params);
  $count['position_id'] = $dbConn->count();
  echo json_encode($count); 
}
if(isset($_POST["checkExistStartDate"])){ //check exist date if used
  $checkExistStartDate = $_POST["checkExistStartDate"];
  $checkExistEndDate = $_POST["checkExistEndDate"];
  $HistoryItemCode = $_POST['HistoryItemCode'];
  $sql = "SELECT * FROM tbl_employee_appointment_history 
  WHERE item_code = '$HistoryItemCode' 
  AND ('$checkExistStartDate' >= start_of_appointment AND '$checkExistEndDate' <= end_of_appointment) 
  OR ('$checkExistStartDate' BETWEEN start_of_appointment AND end_of_appointment)
  OR ('$checkExistEndDate' BETWEEN start_of_appointment AND end_of_appointment)";
  $dbConn->findFirstQuery($sql);
  $count['employee_assignment_id'] = $dbConn->count();
  echo json_encode($count); 
}
if(isset($_POST["getEligibility"])){ //retrieved eligibility details from lib_eligibility
  $Eligibilityid = $_POST["getEligibility"];
  $sql = "SELECT * FROM lib_eligibility WHERE id = '$Eligibilityid'";
  $EligibilityInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($EligibilityInfo); 
}
if(isset($_POST["getCareer"])){ //retrieved Career details from lib_career
  $Careerid = $_POST["getCareer"];
  $sql = "SELECT * FROM lib_career WHERE id = '$Careerid'";
  $CareerInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($CareerInfo); 
}
if(isset($_POST["getVoluntary"])){ //retrieved voluntary work details from lib_voluntary
  $Voluntaryid = $_POST["getVoluntary"];
  $sql = "SELECT * FROM lib_voluntary WHERE id = '$Voluntaryid'";
  $VoluntaryInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($VoluntaryInfo); 
}
if(isset($_POST["getTraining"])){ //retrieved training details from lib_training
  $Trainingid = $_POST["getTraining"];
  $sql = "SELECT * FROM lib_training WHERE id = '$Trainingid'";
  $TrainingInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($TrainingInfo); 
}
if(isset($_POST["getSkills"])){ //retrieved skills details from lib_skill
  $Skillsid = $_POST["getSkills"];
  $sql = "SELECT * FROM lib_skills WHERE id = '$Skillsid'";
  $SkillsInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($SkillsInfo); 
}
if(isset($_POST["getRef"])){ //retrieved references details from lib_references
  $Refid = $_POST["getRef"];
  $sql = "SELECT * FROM lib_references WHERE id = '$Refid'";
  $RefInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($RefInfo); 
}
if(isset($_POST["getNonAcademic"])){ //retrieved non academic details from lib_non_academic
  $NonAcademicid = $_POST["getNonAcademic"];
  $sql = "SELECT * FROM lib_non_academic WHERE id = '$NonAcademicid'";
  $NonAcademicInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($NonAcademicInfo); 
}
if(isset($_POST["getReqestVerification"])){
  $UploadEducID = $_POST["getReqestVerification"];
  $sql = "SELECT a.empno, a.id,a.acad_level,cs.college_school_title,cc.college_course_title, a.acad_highest_level, a.acad_remarks,
          a.acad_year_graduated, a.acad_honors, a.acad_status, a.acad_remarks, a.acad_from, a.acad_to, a.acad_uploaded_mov,
          CONCAT(a.acad_from,'-',a.acad_to) AS acad_period, 
          CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
          FROM lib_academic a
          JOIN userprofile u ON u.empno = a.empno
          LEFT JOIN lib_college_school cs on a.acad_school = cs.id
          LEFT JOIN lib_college_course cc on a.acad_degree = cc.id
          WHERE a.id = '$UploadEducID'";
  $EducUploadInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($EducUploadInfo); 
}
if(isset($_POST["getReqestEligibilityVerification"])){
  $UploadEligibilityID = $_POST["getReqestEligibilityVerification"];
  $sql = "SELECT e.*,le.elibility_title,CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_eligibility e
            JOIN userprofile u ON u.empno = e.empno
            LEFT JOIN lib_list_eligibility le ON e.eligibility_credentials = le.id
            WHERE e.id = '$UploadEligibilityID'";
  $EligibilityUploadInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($EligibilityUploadInfo); 
}
if(isset($_POST["getReqestCareerVerification"])){
  $UploadCareerID = $_POST["getReqestCareerVerification"];
  $sql = "SELECT c.*,CONCAT(c.career_date_from,'-',c.career_date_to) AS career_period, CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_career c
            JOIN userprofile u ON u.empno = c.empno
            WHERE c.id = '$UploadCareerID'";
  $CareerUploadInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($CareerUploadInfo); 
}
if(isset($_POST["getReqestTrainingVerification"])){
  $UploadTrainingID = $_POST["getReqestTrainingVerification"];
  $sql = "SELECT t.*,CONCAT(t.training_date_from,'-',t.training_date_to) AS training_period,CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_training t
            JOIN userprofile u ON u.empno = t.empno
            WHERE t.id = '$UploadTrainingID'";
  $TrainingUploadInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($TrainingUploadInfo); 
}
if(isset($_POST["GenerateItemNumber"])){ //retrieve information from lib_position_name, lib_classification_employment and lib_unit to generate item number based on selected status, office and position
  $positionNameID = $_POST['positionNameID'];
  $ClassificationID = $_POST['ClassificationID'];
  $FundSourceID = $_POST['FundSourceID'];
  $output = [];

  $params['fields'] = "position_initial";
  $params['conditions'] = array("position_name_id" => $positionNameID);
  $result = $dbConn->findFirst('lib_position_name',$params);
  $output['position_initial'] = $result['position_initial'];

  $params['fields'] = "classification_employment_initial";
  $params['conditions'] = array("position_classification_id" => $ClassificationID);
  $result = $dbConn->findFirst('lib_classification_employment',$params);
  $output['classification_employment_initial'] = $result['classification_employment_initial'];
  
  $params['fields'] = "fund_source_initial";
  $params['conditions'] = array("fund_source_code" => $FundSourceID);
  $result = $dbConn->findFirst('lib_fund_source',$params);
  $output['fund_source_initial'] = $result['fund_source_initial'];
  echo json_encode($output); 
}
if(isset($_POST['checkItemCodeIncrement'])){ //check if item code format exist and return count
  $checkItemCodeIncrement = $_POST['checkItemCodeIncrement'];
  $param['conditions'] = array('item_code_format' => $checkItemCodeIncrement);
  $dbConn->findFirst('lib_position',$param);
  $count['item_code_format'] = $dbConn->count();
  
  echo json_encode($count);
}
if(isset($_POST["CheckDateCreate"])){ //retrieved position created date
  $ItemNumberCreatedDate = $_POST['CheckDateCreate'];
  $params['fields'] = "date_creation_position";
  $params['conditions'] = array("position_id" => $ItemNumberCreatedDate);
  $result = $dbConn->findFirst('lib_position',$params);
  $output['date_creation_position'] = $result['date_creation_position'];
  echo json_encode($output); 
}
if(isset($_POST["HistoryEmployee"])){ //retrieved position created date
  $HistoryEmployee = $_POST['HistoryEmployee'];
  $sql = "SELECT end_of_appointment FROM tbl_employee_appointment_history
          WHERE empno = '$HistoryEmployee'
          ORDER BY end_of_appointment DESC
          LIMIT 1;";
  $HistoryLastUnfilled=$dbConn->findFirstQuery($sql);
  echo json_encode($HistoryLastUnfilled);
}
if(isset($_POST["optionCollegeCourse"])){ //Kapag Onchange ning educlevel selected College
  $value = $_POST['optionCollegeCourse'];
  $params['fields'] = "id , college_course_title";
  $params['order'] = "college_course_title";
  $params['conditions'] = array("college_course_status" => 0);
  $college_courses=$dbConn->find('lib_college_course',$params);
  $college_course_output = '<option value="">SELECT ONE</option>';
  if($college_courses){
    foreach($college_courses as $college_course){
      $college_course_output .= '<option value='.$college_course['id']. ($value==$college_course['id']?" selected":"") . ' >' .$college_course['college_course_title'].'</option>';
    }
  }
  echo $college_course_output;
}
if(isset($_POST["optionTrainingCourse"])){ //Kapag Onchange ning educlevel selected College
  $value = $_POST['optionTrainingCourse'];
  $params['fields'] = "id , training_course_title";
  $params['order'] = "training_course_title";
  $params['conditions'] = array("training_course_status" => 0);
  $training_courses=$dbConn->find('lib_training_course',$params);
  $training_course_output = '<option value="">SELECT ONE</option>';
  if($training_courses){
    foreach($training_courses as $training_course){
      $training_course_output .= '<option value='.$training_course['id']. ($value==$training_course['id']?" selected":"") . ' >' .$training_course['training_course_title'].'</option>';
    }
  }
  echo $training_course_output;
}
if(isset($_POST["optionGraduateStudies"])){ //Kapag Onchange ning educlevel selected College
  $value = $_POST['optionGraduateStudies'];
  $params['fields'] = "id , graduate_study_title";
  $params['order'] = "graduate_study_title";
  $params['conditions'] = array("graduate_study_status" => 0);
  $graduate_studies=$dbConn->find('lib_graduate_studies',$params);
  $graduate_studies_output = '<option value="">SELECT ONE</option>';
  if($graduate_studies){
    foreach($graduate_studies as $graduate_study){
      $graduate_studies_output .= '<option value='.$graduate_study['id']. ($value==$graduate_study['id']?" selected":"") . ' >' .$graduate_study['graduate_study_title'].'</option>';
    }
  }
  echo $graduate_studies_output;
}
if(isset($_POST["optionPrimarySchool"])){ //Kapag Onchange ning educlevel selected primary school
  $value = $_POST['optionPrimarySchool'];
  $params['fields'] = "id , primary_school_title";
  $params['order'] = "primary_school_title";
  $params['conditions'] = array("primary_school_status" => 0);
  $primary_schools=$dbConn->find('lib_primary_school',$params);
  $primary_schools_output = '<option value="">SELECT ONE</option>';
  if($primary_schools){
    foreach($primary_schools as $primary_school){
      // $primary_schools_output .= '<option value='.$primary_school['id'] . ' >' .$primary_school['primary_school_title'].'</option>';
      $primary_schools_output .= '<option value='.$primary_school['id']. ($value==$primary_school['id']?" selected":"") . ' >' .$primary_school['primary_school_title'].'</option>';
    }
  }
  echo $primary_schools_output;
}
if(isset($_POST["optionSecondarySchool"])){ //Kapag Onchange ning educlevel selected primary school
  $value = $_POST['optionSecondarySchool'];
  $params['fields'] = "id , secondary_school_title";
  $params['order'] = "secondary_school_title";
  $params['conditions'] = array("secondary_school_status" => 0);
  $secondary_schools=$dbConn->find('lib_secondary_school',$params);
  $secondary_schools_output = '<option value="">SELECT ONE</option>';
  if($secondary_schools){
    foreach($secondary_schools as $secondary_school){
      $secondary_schools_output .= '<option value='.$secondary_school['id']. ($value==$secondary_school['id']?" selected":"") . ' >' .$secondary_school['secondary_school_title'].'</option>';
    }
  }
  echo $secondary_schools_output;
}
if(isset($_POST["optionCollegeSchool"])){ //Kapag Onchange ning educlevel selected primary school
  $value = $_POST['optionCollegeSchool'];
  $params['fields'] = "id , college_school_title";
  $params['order'] = "college_school_title";
  $params['conditions'] = array("college_school_status" => 0);
  $college_schools=$dbConn->find('lib_college_school',$params);
  $college_schools_output = '<option value="">SELECT ONE</option>';
  if($college_schools){
    foreach($college_schools as $college_school){
      $college_schools_output .= '<option value='.$college_school['id']. ($value==$college_school['id']?" selected":"") . ' >' .$college_school['college_school_title'].'</option>';
    }
  }
  echo $college_schools_output;
}
if(isset($_POST["eligibility"])){
  $value = $_POST['eligibility'];
  $params['fields'] = "id , elibility_title";
  $params['order'] = "elibility_title";
  $params['conditions'] = array("eligibility_status" => 0);
  $eligibilities=$dbConn->find('lib_list_eligibility',$params);
  $eligibility_output = '<option value="">SELECT ONE</option>';
  if($eligibilities){
    foreach($eligibilities as $eligibility){
      $eligibility_output .= '<option value='.$eligibility['id']. ($value==$eligibility['id']?" selected":"") . ' >' .$eligibility['elibility_title'].'</option>';
    }
  }
  echo $eligibility_output;
}
if(isset($_POST["GenerateEmpID"])){ 
  $output = [];

  $params['fields'] = "last_emp_no";
  $result = $dbConn->findFirst('tbl_emp_last_no',$params);
  $output['last_emp_no'] = $result['last_emp_no'];

  echo json_encode($output); 
}
if(isset($_POST["btnAdminDivisionUpdate"])){ //retrieved skills details from lib_skill
  $AdminDivisionId = $_POST["btnAdminDivisionUpdate"];
  $sql = "SELECT * FROM lib_division WHERE division_code  = '$AdminDivisionId'";
  $AdminDivisionInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($AdminDivisionInfo); 
}
if(isset($_POST["clusterID"])){ 
  $clusterID = $_POST["clusterID"];
  $params['fields'] = "cluster_code, cluster_name";
  $update_clusters=$dbConn->find('lib_cluster',$params);
  $update_clusters_output = '<option value="">SELECT DIVISION</option>';
  if($update_clusters){
    foreach($update_clusters as $update_cluster){
      $update_clusters_output .= '<option value='.$update_cluster['cluster_code']. ($clusterID==$update_cluster['cluster_code']?" selected":"") . ' >' .$update_cluster['cluster_name'].'</option>';
      
    }
  }
  echo $update_clusters_output; 
}
if(isset($_POST["btnAdminUnitUpdate"])){ //retrieved skills details from lib_skill
  $AdminUnitUpdate = $_POST["btnAdminUnitUpdate"];
  $sql = "SELECT * FROM lib_unit WHERE unit_code  = '$AdminUnitUpdate'";
  $AdminUnitInfo=$dbConn->findFirstQuery($sql);
  echo json_encode($AdminUnitInfo); 
}
if(isset($_POST["getBankDetails"])){ 
  $BDid = $_POST["getBankDetails"];
  $sql = "SELECT lbd.*, CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) as FullName
          FROM lib_bank_details lbd
          JOIN userprofile u ON u.empno = lbd.empno
          WHERE id = '$BDid'";
  $Bank_Details=$dbConn->findFirstQuery($sql);
  echo json_encode($Bank_Details); 
}
?>