 <?php
include 'conn_to_ctris.php';
//Drop down ning Region
function fill_region($conn_ctris,$region_id=0){
    $region_sql="SELECT region_code, region_name, region_nick FROM lib_regions";
    $region="";
    $rgoutput = $conn_ctris->prepare($region_sql);
    $rgoutput->execute();
    $rgoutput->bind_result($region_code,$region_name, $region_nick);
    $region .= '<option value="">SELECT REGION</option>';
    while($rgoutput->fetch()){
       $region .= '<option value='.$region_code. ($region_id==$region_code?" selected":"") . ' >' .$region_name.'</option>';
   }
    return $region;
}

//Kapag Onchange ning region
if(isset($_POST["regionAction"])){
  $province_query = "SELECT prov_code,prov_name FROM lib_provinces WHERE region_code = '".$_POST["region_id"]."'";
  $province_result = mysqli_query($conn_ctris, $province_query);
  $province_output .= '<option value="">SELECT PROVINCE</option>';
  while($row = mysqli_fetch_array($province_result))  {
   $province_output .= '<option value="'.$row["prov_code"].'">'.$row["prov_name"].'</option>';
  }
  echo $province_output;
}
//Kapag Onchange ning province
if(isset($_POST["provinceAction"])){
  $city_query = "SELECT city_code, city_name,prov_code FROM lib_cities WHERE prov_code = '".$_POST["province_id"]."'";
  $city_result = mysqli_query($conn_ctris, $city_query);
  $city_output .= '<option value="">SELECT MUNICIPALITY</option>';
  while($row = mysqli_fetch_array($city_result))  {
   $city_output .= '<option value="'.$row["city_code"].'">'.$row["city_name"].'</option>';
  }
  echo $city_output;
}
//Kapag Onchange ning city
if(isset($_POST["cityAction"])){
  $brgy_query = "SELECT brgy_code, brgy_name, city_code FROM lib_brgy WHERE city_code = '".$_POST["city_id"]."'";
  $brgy_result = mysqli_query($conn_ctris, $brgy_query);
  $brgy_output .= '<option value="">SELECT BARANGAY</option>';
  while($row = mysqli_fetch_array($brgy_result))  {
   $brgy_output .= '<option value="'.$row["brgy_code"].'">'.$row["brgy_name"].'</option>';
  }
  echo $brgy_output;
}
//DROP DOWN NING POSITION
function fill_position($conn_ctris,$position_id=0){
    $position_sql="SELECT position_code, position_name FROM lib_position";
    $position="";
    $positionoutput = $conn_ctris->prepare($position_sql);
    $positionoutput->execute();
    $positionoutput->bind_result($position_code,$position_name);
    $position .= '<option value="">SELECT POSITION</option>';
    while($positionoutput->fetch()){
       $position .= '<option value='.$position_code. ($position_id==$position_code?" selected":"") . ' >' .$position_name.'</option>';
   }
    return $position;
}
//Drop down menu for division
function fill_division($conn_ctris,$division_id=0){
    $division_sql="SELECT division_code, division_name, division_name_code FROM lib_division";
    $division="";
    $divoutput = $conn_ctris->prepare($division_sql);
    $divoutput->execute();
    $divoutput->bind_result($division_code, $division_name, $division_name_code);
    $division .= '<option value="">SELECT DIVISION</option>';
    while($divoutput->fetch()){
       $division .= '<option value='.$division_code. ($division_id==$division_code?" selected":"") . ' >' .$division_name.'</option>';
   }
    return $division;
}
//ONCHANGE Drop down menu for UNIT
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
?>