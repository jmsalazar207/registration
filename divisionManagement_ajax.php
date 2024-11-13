<?php
session_start();
header('Content-Type: application/json');
require_once('includes/init.php');

$data = array(); //array return value
$totalRecords = 0; // total number of records
$totalRecordwithFilter = 0; // result of filter


## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value


## Search 
$searchQuery = " WHERE 1 ";
if($searchValue != ''){
   $searchQuery .= "AND (d.division_name LIKE '%".$searchValue."%' OR
            d.division_name_code LIKE '%".$searchValue."%' OR
            c.cluster_name LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(division_code) as allcount FROM lib_division");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(division_code) as allcount  
                                    FROM lib_division d
                                    JOIN lib_cluster c ON c.cluster_code  = d.cluster_code
                                    LEFT JOIN userprofile added ON added.empno = d.added_by
                                    LEFT JOIN userprofile updated ON updated.empno = d.updated_by
                                    LEFT JOIN userprofile deleted ON deleted.empno = d.deleted_by"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql = "SELECT d.division_code,d.division_name, d.division_name_code, c.cluster_name, 
            CONCAT (added.sname, ' ', added.fname, ' ', added.mname) AS added_by,
            d.datetime_added,
            CONCAT (updated.sname, ' ', updated.fname, ' ', updated.mname) AS updated_by,
            d.datetime_updated,
            CONCAT (deleted.sname, ' ', deleted.fname, ' ', deleted.mname) AS deleted_by,
            d.datetime_deleted
            FROM lib_division d
            JOIN lib_cluster c ON c.cluster_code  = d.cluster_code
            LEFT JOIN userprofile added ON added.empno = d.added_by
            LEFT JOIN userprofile updated ON updated.empno = d.updated_by
            LEFT JOIN userprofile deleted ON deleted.empno = d.deleted_by
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$divRecords = $dbConn->findQuery($sql);
if($divRecords){
   foreach($divRecords as $row){
	$divCode = $row['division_code'];
   
    $action = "<td>
                  <button class='' onclick ='divisionViewInfo(this.value)' value = '$divCode'  title='View' >
                     View Info
                  </button>
                 
               </td>";  
   
   $data[] = array(
      "Action" => $action,
      "division_name" => $row["division_name"],
      "division_name_code"=> $row["division_name_code"],
      "cluster_name"=> $row["cluster_name"],
      "added_by"=> $row["added_by"],
      "datetime_added"=> $row["datetime_added"],
      "updated_by"=> $row["updated_by"],
      "datetime_updated"=> $row["datetime_updated"],
      "deleted_by"=> $row["deleted_by"],
      "datetime_deleted"=> $row["datetime_deleted"]
   );
   }
}


   ## Response
   $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
   );

   echo json_encode($response);