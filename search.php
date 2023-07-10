<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';
if(isset($_POST['btn_search'])){
$user = [];
            $user['empno'] = $_POST['txtSearch'];
            $param['conditions'] = array('empno' => $user['empno']); 
            $exists = $dbConn->findFirst('userprofile',$param);
            if($dbConn->count() > 0)
            {
                echo "
                    <script type='text/javascript'>
                    $(document).ready(function(){
                    $('#AlreadyExist').modal('show');
                    });
                    </script>
                    ";
                $_SESSION['insert'] = 'exists';
                header('Location: index.php');
            }
            else
            {

            }
}




?>