 <?php
 include "includes/getUserAccess.php";
 $current_page = basename($_SERVER['PHP_SELF']);
 $page = '/' . $current_page;
 
 if (!isset($_SESSION['userID'])) {
  header("Location: includes/logout.php");
  exit();
}

 if (!hasAccess($dbConn, emp_no: $_SESSION['userID'], page_url: $page)) {
  $_SESSION['forbidden'] = 1;
  header("Location:forbidden.php");
  
}