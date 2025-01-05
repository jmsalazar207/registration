<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");

    $data = [];
    $user = []; 
    $empNumber = $_SESSION['userID'];
    $sql = "SELECT up.empno,up.date_filled,up.fname,up.mname, up.sname, up.ename, up.mobile, 
    up.telephone, up.sex, up.birthdate, up.eaddress, up.numAdd, up.street, up.subd, r.region_name, prov.prov_name,
    muni.city_name, brgy.brgy_name, up.zip_code, up.region, up.province, up.city, up.barangay, pos.item_code, pn.position_name, u.unit_name, d.division_name,
    up.date_registered, up.user_level, up.account_status, pa.id, pa.permNumAdd, pa.permStreet, pa.permSubd, pa.permRegion, pa.permProvince, pa.permCity, pa.permBarangay, pa.permZipCode, pa.sameAddress, 
    pi.id,pi.pob,pi.citizenship,pi.byBirth,pi.byNaturalization,pi.country_citizenship,pi.civil_status,pi.civil_status_other,pi.height,pi.weight,pi.blood_type,pi.gsis_no,pi.pagibig_no,pi.philhealth_no,
    pi.sss_no,pi.tin_no, oi.q1a,oi.q1b,oi.q1b_details,oi.q2a,oi.q2a_details, oi.q2b,oi.q2b_datefiled,oi.q2_status,oi.q3_details,oi.q3,oi.q4,oi.q4_details,oi.q5a,oi.q5a_details,oi.q5b,oi.q5b_details,oi.q6,
    oi.q6_details,oi.q7a,oi.q7a_details,oi.q7b,oi.q7b_details,oi.q7c,oi.q7c_details,gi.id,gi.govern_id_title,gi.govern_id_no,gi.govern_id_date,gi.govern_id_place
    FROM userprofile up
    LEFT JOIN lib_regions r on r.region_code = up.region
    LEFT JOIN lib_provinces prov on prov.prov_code = up.province
    LEFT JOIN lib_cities muni on muni.city_code = up.city
    LEFT JOIN lib_brgy brgy on brgy.brgy_code = up.barangay
    LEFT JOIN lib_position pos ON up.position_id = pos.position_id
    LEFT JOIN lib_unit u ON pos.area_assignment = u.unit_code
    LEFT JOIN lib_division d ON u.division_code = d.division_code
    LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
    LEFT JOIN lib_perm_address pa on pa.empno = up.empno
    LEFT JOIN lib_personal_info pi on pi.empno = up.empno
    LEFT JOIN other_info oi ON up.empno = oi.empno
    LEFT JOIN lib_govern_id gi on up.empno = gi.empno
    WHERE up.empno = '$empNumber'";
    $data = $dbConn->findFirstQuery($sql);
    if($data) {
        $data['sessionEmpno'] = $data['empno'];
        $data['sessionFname'] = $data['fname'];
        $data['sessionMname'] = $data['mname'];
        $data['sessionLname'] = $data['sname'];
        $data['sessionUserlevel'] = $data['user_level'];
        $data['sessionPosition'] = $data['position_name'];
    }else{

    }
    echo json_encode($data);
   
