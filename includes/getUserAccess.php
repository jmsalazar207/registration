<?php
require_once("includes/init.php");
require_once("includes/helper.php");
        function hasAccess($dbConn, $emp_no, $page_url) {
                $sql = "SELECT COUNT(*) as count FROM tbl_access_level tal
                        JOIN tbl_page_access tpa ON tpa.page_access_code = tal.page_access_code
                        WHERE tal.access_level_empno = ? AND tpa.page_access_link = ?";

                $params = array($emp_no, $page_url);
                $result = $dbConn->findQuery($sql, $params); 

                return ($result[0]['count'] > 0);
        }
        function getAccessCodes($dbConn, $emp_no) {
                $sql = "SELECT tpa.page_access_code 
                        FROM tbl_access_level tal
                        JOIN tbl_page_access tpa ON tpa.page_access_code = tal.page_access_code
                        WHERE tal.access_level_empno = ?";

                $params = array($emp_no);
                $result = $dbConn->findQuery($sql, $params); 

                return $result;
        }
            
