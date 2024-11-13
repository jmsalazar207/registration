<?php
/* MySQL server connection.
MySQL server with default setting (user 'root' with no password) */
 //$link = mysqli_connect("172.31.32.64", "ERM", "P@ssw0rd", "registration");
$link = mysqli_connect("localhost", "root", "", "registration_staging");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT id, primary_school_title FROM lib_primary_school WHERE primary_school_title LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "
                        <p>
                            <span class='school_id' style='display:none;'>".$row["id"]."</span>
                            <span class='schl_name'>". $row["primary_school_title"] . "</span>
                        </p>
                        ";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>