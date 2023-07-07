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
if(isset($_POST["divisionAction"])){
  $unit_output = '';
  $unit_query = "SELECT unit_code, unit_name, unit_name_code, division_code FROM lib_unit WHERE division_code = '".$_POST["division_ids"]."'";
  $unit_result = mysqli_query($conn_ctris, $unit_query);
  $unit_output .= '<option value="">SELECT UNIT</option>';
  while($row = mysqli_fetch_array($unit_result))  {
   $unit_output .= '<option value="'.$row["unit_code"].'">'.$row["unit_name"].'</option>';
  }
  echo $unit_output;
}
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

?>