<?php

require_once('includes/init.php');

$sql = "SELECT empno, uploaded_id FROM userprofile WHERE uploaded_id != '' AND is_rename = 0";

$users = $dbConn->findQuery($sql);

foreach($users as $user){
    $empno = $user['empno'];
    $filename = $user['uploaded_id'];
    $explode = explode('.',$filename);

    $new_filename = '';
    if(count($explode) == 1){
        continue;
        // rename('uploadedID/'.$filename,'uploadedID/_'.$empno);
        // $new_filename = '_'.$empno;
    }else{
        $valid_extension = ['jpg','jpeg','png','jfif'];
        $extFile = end($explode);
        if(in_array($extFile,$valid_extension)){
            rename('Rename_uploadedID/_'.$filename,'Rename_uploadedID/_'.$empno.'.'.$extFile);
            $new_filename = '_'.$empno.'.'.$extFile;
            $sql = "UPDATE userprofile SET uploaded_id = '$new_filename', is_rename = 20 WHERE empno = '$empno'";
            $dbConn->updateQuery($sql);
        }
    }


}

