<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


if (isset($_POST["addEmpNo"])) {
    $empno = '03-'.$_POST['addEmpNo'];
    $param['conditions'] = array('empno' => $empno);
    $dbConn->findFirst('userprofile', $param);
    $count['empNO'] = $dbConn->count();
    echo json_encode($count);
}
if (isset($_POST["updateEmpNo"])) {
    $empno = '03-'.$_POST['updateEmpNo'];
    $oldempno = '03-'.$_POST['adminOldEmpno'];
    $sql_empno = "SELECT * FROM userprofile WHERE empno = '$empno' AND empno != '$oldempno'";
    $dbConn->findFirstQuery($sql_empno);
    $count['updateEmpNO'] = $dbConn->count();
    echo json_encode($count);
}
if (isset($_POST["adminDivision"])) {
   $type = $_POST['type']; 
   if($type ==1){ //insert
      $divName = $_POST['adminDivision'];
      $sql_division = "SELECT * FROM lib_division WHERE division_name = '$divName' AND division_status != 3";
      $dbConn->findFirstQuery($sql_division);
      $count['divName'] = $dbConn->count();
      echo json_encode($count);
   }else{
      $divisionCode = $_POST['DivisionID'];
      $divName = $_POST['adminDivision'];
      $sql_division = "SELECT * FROM lib_division WHERE division_name = '$divName' AND division_code != '$divisionCode' AND division_status != 3";
      $dbConn->findFirstQuery($sql_division);
      $count['divName'] = $dbConn->count();
      echo json_encode($count);
   }

}
if(isset($_POST['gsis'])){
    $empno = $_SESSION['userID'];

    $gsis = $_POST['gsis'];
    $sql_gsis = "SELECT * FROM lib_personal_info WHERE gsis_no = '$gsis' AND empno != '$empno' AND gsis_no != ''";
    $dbConn->findFirstQuery($sql_gsis);
    $count['gsis'] = $dbConn->count();
    
    $pagibig = $_POST['pagibig'];
    $sql_pagibig = "SELECT * FROM lib_personal_info WHERE pagibig_no = '$pagibig' AND empno != '$empno' AND pagibig_no != ''";
    $dbConn->findFirstQuery($sql_pagibig);
    $count['pagibig'] = $dbConn->count();
    
    $philhealth = $_POST['philhealth'];
    $sql_philhealth = "SELECT * FROM lib_personal_info WHERE philhealth_no = '$philhealth' AND empno != '$empno' AND philhealth_no != ''";
    $dbConn->findFirstQuery($sql_philhealth);
    $count['philhealth'] = $dbConn->count();
    
    $sss = $_POST['sss'];
    $sql_sss = "SELECT * FROM lib_personal_info WHERE sss_no = '$sss' AND empno != '$empno' AND sss_no != ''";
    $dbConn->findFirstQuery($sql_sss);
    $count['sss'] = $dbConn->count();

    $tin = $_POST['tin'];
    $sql_tin = "SELECT * FROM lib_personal_info WHERE tin_no = '$tin' AND empno != '$empno' AND tin_no != ''";
    $dbConn->findFirstQuery($sql_tin);
    $count['tin'] = $dbConn->count();

    echo json_encode($count);
}
if (isset($_POST['CivilStatus'])){
   $SesssionEmpno = $_SESSION['userID'];
   $sql_civil_status = "SELECT civil_status FROM lib_personal_info WHERE empno ='$SesssionEmpno'";
   $civilStat = $dbConn->findFirstQuery($sql_civil_status);
   echo json_encode($civilStat);

}
if (isset($_POST['employeeNumber'])){
    $FBEmpno = $_SESSION['userID'];


    $sql_spouse = "SELECT * FROM lib_family_background WHERE empno = '$FBEmpno' AND relation = 1 AND status !=4";
    $dbConn->findFirstQuery($sql_spouse);
    $count['spouse'] = $dbConn->count();

    $sql_father = "SELECT * FROM lib_family_background WHERE empno = '$FBEmpno' AND relation = 3 AND status !=4";
    $dbConn->findFirstQuery($sql_father);
    $count['father'] = $dbConn->count();
    
    $sql_mother = "SELECT * FROM lib_family_background WHERE empno = '$FBEmpno' AND relation = 4 AND status !=4";
    $dbConn->findFirstQuery($sql_mother);
    $count['mother'] = $dbConn->count();

    $sql_elementary = "SELECT * FROM lib_academic WHERE empno = '$FBEmpno' AND acad_level = 1 AND acad_status !=4";
    $dbConn->findFirstQuery($sql_elementary);
    $count['elementary'] = $dbConn->count();

    $sql_secondary = "SELECT * FROM lib_academic WHERE empno = '$FBEmpno' AND acad_level = 2 AND acad_status !=4";
    $dbConn->findFirstQuery($sql_secondary);
    $count['secondary'] = $dbConn->count();

    $sql_count_acad = "SELECT * FROM lib_academic WHERE empno = '$FBEmpno'";
    $dbConn->findFirstQuery($sql_count_acad);
    $count['acad_level'] = $dbConn->count();

    $sql_count_eligibility = "SELECT * FROM lib_eligibility WHERE empno = '$FBEmpno'";
    $dbConn->findFirstQuery($sql_count_eligibility);
    $count['eligibility'] = $dbConn->count();

    $sql_count_training = "SELECT * FROM lib_training WHERE empno = '$FBEmpno'";
    $dbConn->findFirstQuery($sql_count_training);
    $count['training'] = $dbConn->count();

    $sql_count_career = "SELECT * FROM lib_career WHERE empno = '$FBEmpno'";
    $dbConn->findFirstQuery($sql_count_career);
    $count['career'] = $dbConn->count();

    echo json_encode($count);
}
if(isset($_POST['countPresent'])){
    $empno = $_SESSION['userID'];
   $countPresent = $_POST['countPresent'];
   $sql = "SELECT * FROM lib_career WHERE empno = '$empno' AND career_status != 4 AND career_present = 'on'";
   $dbConn->findFirstQuery($sql);
   $count['countPresent'] = $dbConn->count();
   echo json_encode($count);
}
if(isset($_POST['ItemNumber'])){
   $ItemNumber = $_POST['ItemNumber'];
   $sql = "SELECT * FROM lib_position WHERE item_code = '$ItemNumber' AND position_status != 3";
   $dbConn->findFirstQuery($sql);
   $count['ItemCode'] = $dbConn->count();
   echo json_encode($count);
}
if(isset($_POST['PositionName'])){ //Check exist add
    $PositionName = $_POST['PositionName'];
    $param['conditions'] = array('position_name' => $PositionName,'status' => '0');
    $dbConn->findFirst('lib_position_name',$param);
    $count['PositionName'] = $dbConn->count();

    $PositionInitial = $_POST['PositionInitial'];
    $param['conditions'] = array('position_initial' => $PositionInitial,'status' => '0');
    $dbConn->findFirst('lib_position_name',$param);
    $count['PositionInitial'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['UpdatePositionName'])){ //Check exist update
    $UpdatePosNameID = $_POST['UpdatePositionNameID'];

    $UpdatePositionName = $_POST['UpdatePositionName'];
    $sql = "SELECT position_name FROM lib_position_name WHERE position_name = '$UpdatePositionName' AND position_name_id !='$UpdatePosNameID'";
    $dbConn->findFirstQuery($sql);
    $count['UpdatePositionName'] = $dbConn->count();

    $UpdatePositionInitial = $_POST['UpdatePositionInitial'];
    $sql = "SELECT position_initial FROM lib_position_name WHERE position_initial = '$UpdatePositionInitial' AND position_name_id !='$UpdatePosNameID'";
    $dbConn->findFirstQuery($sql);
    $count['UpdatePositionInitial'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['governID'])){
    $ID = $_SESSION['userID'];
    $sql_govern_ID = "SELECT * FROM lib_govern_id WHERE empno = '$ID'";
    $dbConn->findFirstQuery($sql_govern_ID);
    $count['Govern_ID'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['countReference'])){
    $ID = $_SESSION['userID'];
    $sql_ref = "SELECT * FROM lib_references WHERE empno = '$ID' AND ref_status != 4";
    $dbConn->findFirstQuery($sql_ref);
    $count['countRef'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['RefMobNumber'])){
   $type = $_POST['type']; //1 for add, 2 for update
   if($type ==1){
      $RefMobile = $_POST['RefMobNumber'];
      $ID = $_SESSION['userID'];
      $sql_refMobile = "SELECT * FROM lib_references WHERE empno = '$ID' AND ref_mobile = '$RefMobile' AND ref_status != 4";
  
      $dbConn->findFirstQuery($sql_refMobile);
      $count['countRefMobile'] = $dbConn->count();
  
      echo json_encode($count);
   }else{
      $RefID = $_POST['RefID'];
      $RefMobile = $_POST['RefMobNumber'];
      $ID = $_SESSION['userID'];
      $sql_refMobile = "SELECT * FROM lib_references WHERE empno = '$ID' AND ref_mobile = '$RefMobile' AND id != '$RefID' AND ref_status != 4";
      $dbConn->findFirstQuery($sql_refMobile);
      $count['countRefMobile'] = $dbConn->count();
  
      echo json_encode($count);
   }

 }
 if(isset($_POST['BasicInfo'])){
    $ID = $_SESSION['userID'];
    $sql_Basic_Info = "SELECT * FROM lib_perm_address WHERE empno = '$ID'";
    $dbConn->findFirstQuery($sql_Basic_Info);
    $count['Basic_Info'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['BasicOtherInfo'])){
    $ID = $_SESSION['userID'];
    $sql_Basic_Other_Info = "SELECT * FROM lib_personal_info WHERE empno = '$ID'";
    $dbConn->findFirstQuery($sql_Basic_Other_Info);
    $count['Basic_Other_Info'] = $dbConn->count();

    echo json_encode($count);
 }
 if(isset($_POST['SearchEmpID'])){

   $ID = $_POST['SearchEmpID'];
   $sql_Emp_ID = "SELECT empno FROM userprofile WHERE empno = '$ID' AND emp_status <= 1";
   $dbConn->findFirstQuery($sql_Emp_ID);
   $count['EmpID'] = $dbConn->count();

   $Email_Add = $_POST['checkEmailMatch'];
   $sql_Email_Add = "SELECT empno FROM userprofile WHERE empno = '$ID' AND eaddress = '$Email_Add' AND emp_status <= 1";
   $dbConn->findFirstQuery($sql_Email_Add);
   $count['EmailAdd'] = $dbConn->count();

   echo json_encode($count);
}
if(isset($_POST['resetUsername'])){

   $ID = $_POST['resetUsername'];
   $TempPassword = md5($_POST['resetTempPassword']);
   $sql_validate = "SELECT * FROM userprofile WHERE empno = '$ID' AND temp_password = '$TempPassword' AND emp_status <= 1";
   $dbConn->findFirstQuery($sql_validate);
   $count['EmpID'] = $dbConn->count();
   echo json_encode($count);
}
if(isset($_POST['attemptEmpNO'])){
   $attemptEmpNO = $_POST['attemptEmpNO'];
   $sql_count_attempt = "SELECT password_attempt FROM userprofile WHERE empno = '$attemptEmpNO'";
   $count_attempt = $dbConn->findFirstQuery($sql_count_attempt);
   echo json_encode($count_attempt);
}
if(isset($_POST['checkFamilyBackground'])){
   $type = $_POST['checkFamilyBackground'];
   if($type==1){  //insert
      $ID = $_SESSION['userID'];
      $FBSname = $_POST['FBSname'];
      $FBFname = $_POST['FBFname'];
      $FBMname = $_POST['FBMname'];
      $FBExtname = $_POST['FBExtname'];
   
      $sql = "SELECT * FROM lib_family_background WHERE surname = '$FBSname' AND firstname = '$FBFname' AND middlename = '$FBMname' AND extname = '$FBExtname' AND empno = '$ID' AND status != '4'";
      $dbConn->findFirstQuery($sql);
      $count['FamilyBackground'] = $dbConn->count();
      echo json_encode($count);
   }else{
      $ID = $_SESSION['userID'];
      $UpdateID = $_POST['FBUpdateID'];
      $FBSname = $_POST['FBSname'];
      $FBFname = $_POST['FBFname'];
      $FBMname = $_POST['FBMname'];
      $FBExtname = $_POST['FBExtname'];
   
      $sql = "SELECT * FROM lib_family_background WHERE surname = '$FBSname' AND firstname = '$FBFname' AND middlename = '$FBMname' AND extname = '$FBExtname' AND empno = '$ID' AND id != '$UpdateID' AND status != '4'";
      $dbConn->findFirstQuery($sql);
      $count['FamilyBackground'] = $dbConn->count();
      echo json_encode($count);
   }

}
if(isset($_POST['checkAcademic'])){
   $type = $_POST['checkAcademic'];
   if($type==1){  //insert
      $ID = $_SESSION['userID'];
      $acad_PeriodFrom = $_POST['acadPeriodFrom'];
      $acad_PeriodTo = $_POST['acadPeriodTo']; 
      
      $sql = "SELECT * FROM lib_academic 
      WHERE empno = '$ID'
      AND acad_status != '4'
      AND (
          (acad_from BETWEEN '$acad_PeriodFrom' AND '$acad_PeriodTo') OR
          (acad_to BETWEEN '$acad_PeriodFrom' AND '$acad_PeriodTo') OR
          ('$acad_PeriodFrom' BETWEEN acad_from AND acad_to) OR
          ('$acad_PeriodTo' BETWEEN acad_from AND acad_to)
          )
      AND NOT (
             acad_to = $acad_PeriodFrom
          )
          ";
      $dbConn->findFirstQuery($sql);
      $count['Academic'] = $dbConn->count();
      echo json_encode($count);

   }else{   //update
      $ID = $_SESSION['userID'];
      $acad_PeriodFrom = $_POST['acadPeriodFrom'];
      $acad_PeriodTo = $_POST['acadPeriodTo'];
      $AcademicID = $_POST['AcademicID'];
      
      $sql = "SELECT * FROM lib_academic 
      WHERE empno = '$ID'
      AND id != '$AcademicID'
      AND acad_status != '4'
      AND (
          (acad_from BETWEEN '$acad_PeriodFrom' AND '$acad_PeriodTo') OR
          (acad_to BETWEEN '$acad_PeriodFrom' AND '$acad_PeriodTo') OR
          ('$acad_PeriodFrom' BETWEEN acad_from AND acad_to) OR
          ('$acad_PeriodTo' BETWEEN acad_from AND acad_to)
          )
      AND NOT (
             acad_to = $acad_PeriodFrom
          )
          ";
      $dbConn->findFirstQuery($sql);
      $count['Academic'] = $dbConn->count();
      echo json_encode($count);

   }

}
if(isset($_POST["inUsedDivision"])){ //retrieved skills details from lib_skill
   $inUsedDivision = $_POST["inUsedDivision"];
   $sql = "SELECT pos.position_id
           FROM lib_position pos
           JOIN lib_unit u ON  pos.unit_code = u.unit_code
           JOIN lib_division d ON u.division_code = d.division_code
           WHERE d.division_code = '$inUsedDivision' 
           AND pos.position_status != 3;";
        $dbConn->findFirstQuery($sql);
        $count['inUsedDivision'] = $dbConn->count();
        echo json_encode($count);
 }
 
 
 

