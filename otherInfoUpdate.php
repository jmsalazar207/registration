<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
    echo json_encode($dataReturn);
}else{              $id = $_SESSION['userID'];
                    $otherInfoUpdate['pob'] = $_POST['PlaceOfBirth'];
                    $otherInfoUpdate['citizenship'] = $_POST['chkFilipino'];
                    $otherInfoUpdate['byBirth'] = isset($_POST['chkByBirth']) ? $_POST['chkByBirth']: '';
                    $otherInfoUpdate['byNaturalization'] = isset($_POST['chkByNaturalization']) ? $_POST['chkByNaturalization']: '';
                    $otherInfoUpdate['country_citizenship'] = isset($_POST['DualCitizenCountry'])? $_POST['DualCitizenCountry']: '';
                    $otherInfoUpdate['civil_status'] = $_POST['CivilStatus'];
                    $otherInfoUpdate['civil_status_other'] = isset($_POST['OthersCivilStatus']) ? sanitize(strtoupper($_POST['OthersCivilStatus'])): '';
                    $otherInfoUpdate['height'] = sanitize(strtoupper($_POST['Height']));
                    $otherInfoUpdate['weight'] = sanitize(strtoupper($_POST['Weight']));
                    $otherInfoUpdate['blood_type'] = sanitize(strtoupper($_POST['BloodType']));
                    $otherInfoUpdate['gsis_no'] = sanitize(strtoupper($_POST['gsisNo']));
                    $otherInfoUpdate['pagibig_no'] = sanitize(strtoupper($_POST['pagibigNo']));
                    $otherInfoUpdate['philhealth_no'] = sanitize(strtoupper($_POST['philhealthNo']));
                    $otherInfoUpdate['sss_no'] = sanitize(strtoupper($_POST['sssNo']));
                    $otherInfoUpdate['tin_no'] = sanitize(strtoupper($_POST['tinNo']));
                    $otherInfoUpdateQuery = $dbConn->update('lib_personal_info', 'empno', $id, $otherInfoUpdate);
                    // echo $adminUpdateQuery;

                    if($otherInfoUpdateQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Information has been updated successfully.";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
