<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");

    $data = [];
    $user = []; 
    $empNumber = $_SESSION['userID'];
    $sql = "SELECT 
    COUNT(DISTINCT la.id) AS academic,
    COUNT(DISTINCT le.id) AS eligibility, 
    COUNT(DISTINCT lt.id) AS training, 
    COUNT(DISTINCT lc.id) AS career, 
    COUNT(DISTINCT lb.id) AS bank,
    (
        COUNT(DISTINCT la.id) + 
        COUNT(DISTINCT le.id) + 
        COUNT(DISTINCT lt.id) + 
        COUNT(DISTINCT lc.id) + 
        COUNT(DISTINCT lb.id)
    ) AS total
FROM userprofile u
LEFT JOIN lib_academic la ON la.empno = u.empno AND la.acad_status = 2
LEFT JOIN lib_eligibility le ON le.empno = u.empno AND le.eligibility_status = 2
LEFT JOIN lib_training lt ON lt.empno = u.empno AND lt.training_status = 2
LEFT JOIN lib_career lc ON lc.empno = u.empno AND lc.career_status = 2
LEFT JOIN lib_bank_details lb ON lb.empno = u.empno AND lb.bank_account_status = 2
    WHERE u.empno = '$empNumber'";
    $data = $dbConn->findFirstQuery($sql);
    if($data) {
    echo json_encode($data);
    }
   
