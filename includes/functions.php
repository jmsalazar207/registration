 <?php
// include 'conn_to_ctris.php';
require_once('init.php');
//Drop down ning Region
function fill_region($dbConn,$region_id=0){
    // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
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

//Kapag Onchange ning region
if(isset($_POST["regionAction"])){
  $region_code = $_POST["region_id"];
  $params['fields'] = "prov_code, prov_name";
  $params['conditions'] = array("region_code" => $region_code);
  $provinces=$dbConn->find('lib_provinces',$params);
  $province_output = '<option value="">SELECT PROVINCE</option>';
  if($provinces){
    foreach($provinces as $province){
      $province_output .= '<option value='.$province['prov_code'] . ' >' .$province['prov_name'].'</option>';
    }
  }
  echo $province_output;
}
//Kapag Onchange ning province
if(isset($_POST["provinceAction"])){
  $province_code = $_POST["province_id"];
  $params['fields'] = "city_code, city_name";
  $params['conditions'] = array("prov_code" => $province_code);
  $cities=$dbConn->find('lib_cities',$params);
  $city_output = '<option value="">SELECT MUNICIPALITY</option>';
  if($cities){
    foreach($cities as $city){
      $city_output .= '<option value='.$city['city_code'] . ' >' .$city['city_name'].'</option>';
    }
  }
  echo $city_output; 
}

//Kapag Onchange ning city
if(isset($_POST["cityAction"])){
  $city_code = $_POST["city_id"];
  $params['fields'] = "brgy_code, brgy_name";
  $params['conditions'] = array("city_code" => $city_code);
  $brgys=$dbConn->find('lib_brgy',$params);
  $brgy_output = '<option value="">SELECT BARANGAY</option>';
  if($brgys){
    foreach($brgys as $brgy){
      $brgy_output .= '<option value='.$brgy['brgy_code'] . ' >' .$brgy['brgy_name'].'</option>';
    }
  }
  echo $brgy_output; 
}

//ONCHANGE Drop down menu for UNIT
//Kapag Onchange ning city
if(isset($_POST["divisionAction"])){
  $division_code = $_POST["division_ids"];
  $params['fields'] = "unit_code, unit_name";
  $params['conditions'] = array("division_code" => $division_code);
  $units=$dbConn->find('lib_unit',$params);
  $units_output = '<option value="">SELECT UNIT</option>';
  if($units){
    foreach($units as $unit){
      $units_output .= '<option value='.$unit['unit_code'] . ' >' .$unit['unit_name'].'</option>';
    }
  }
  echo $units_output; 
}
//
function fill_position($dbConn,$position_id=0){
  // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
  $params['fields'] = "position_code, position_name";
  $params['group'] = "position_code, position_name";
  $positions=$dbConn->find('lib_position',$params);
  $output = '<option value="">SELECT POSITION</option>';
  if($positions){
    foreach($positions as $position){
      $output .= '<option value='.$position['position_code']. ($position_id==$position['position_code']?" selected":"") . ' >' .$position['position_name'].'</option>';
    }
  }
 return $output;
}
function fill_division($dbConn,$division_id=0){
  // $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
  $params['fields'] = "division_code, division_name, division_name_code";
  $params['group'] = "division_code, division_name, division_name_code";
  $divisions=$dbConn->find('lib_division',$params);
  $output = '<option value="">SELECT DIVISION</option>';
  if($divisions){
    foreach($divisions as $division){
      $output .= '<option value='.$division['division_code']. ($division_id==$division['division_code']?" selected":"") . ' >' .$division['division_name'].'</option>';
    }
  }
 return $output;
}
//Information when old employee
if(isset($_POST["empno"])){
  $empNO = $_POST["empno"];
  $params['conditions'] = array("empno" => $empNO);
  $UpdateInfo=$dbConn->findFirst('userprofile',$params);
  echo json_encode($UpdateInfo); 
}
if(isset($_POST["update_region_id"])){
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
if(isset($_POST["update_province_id"])&& isset($_POST['Where_region_ID'])){
  $update_province_id = $_POST["update_province_id"];
  $Where_region_id = $_POST["Where_region_ID"];
  $params['fields'] = "prov_code, prov_name";
  $params['conditions'] = array("region_code" => $Where_region_id);
  $update_provinces=$dbConn->find('lib_provinces',$params);
  $update_provinces_output = '<option value="">SELECT PROVINCE/option>';
  if($update_provinces){
    foreach($update_provinces as $update_province){
      $update_provinces_output .= '<option value='.$update_province['prov_code']. ($update_province_id==$update_province['prov_code']?" selected":"") . ' >' .$update_province['prov_name'].'</option>';
      
    }
  }
  echo $update_provinces_output; 
}
if(isset($_POST["update_city_id"])&& isset($_POST['Where_province_ID'])){
  $update_city_id = $_POST["update_city_id"];
  $Where_province_id = $_POST["Where_province_ID"];
  $params['fields'] = "city_code, city_name";
  $params['conditions'] = array("prov_code" => $Where_province_id);
  $update_cities=$dbConn->find('lib_cities',$params);
  $update_city_output = '<option value="">SELECT MUNICIPALITY</option>';
  if($update_cities){
    foreach($update_cities as $update_city){
      $update_city_output .= '<option value='.$update_city['city_code']. ($update_city_id==$update_city['city_code']?" selected":"") . ' >' .$update_city['city_name'].'</option>';
    }
  }
  echo $update_city_output; 
}
if(isset($_POST["update_barangay_id"])&& isset($_POST['Where_city_ID'])){
  $update_barangay_id = $_POST["update_barangay_id"];
  $Where_city_id = $_POST["Where_city_ID"];
  $params['fields'] = "brgy_code, brgy_name";
  $params['conditions'] = array("city_code" => $Where_city_id);
  $update_brgys=$dbConn->find('lib_brgy',$params);
  $update_brgys_output = '<option value="">SELECT BARANGAY</option>';
  if($update_brgys){
    foreach($update_brgys as $update_brgy){
      $update_brgys_output .= '<option value='.$update_brgy['brgy_code']. ($update_barangay_id==$update_brgy['brgy_code']?" selected":"") . ' >' .$update_brgy['brgy_name'].'</option>';
    }
  }
  echo $update_brgys_output; 
}
?>