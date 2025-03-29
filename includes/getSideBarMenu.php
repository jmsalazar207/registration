<?php
        require_once("includes/init.php");
        require_once("includes/helper.php");
        function getSidebarMenu($dbConn, $emp_no) {
                $sql = "SELECT tpa.page_access_code, 
                tpa.page_access_name, 
                tpa.page_access_group_id, 
                tpa.page_access_group_title, 
                tpa.page_access_link, 
                tpa.page_access_icon, 
                tpa.page_access_group_icon
                FROM tbl_page_access tpa
                LEFT JOIN tbl_access_level tal 
                ON tpa.page_access_code = tal.page_access_code 
                AND tal.access_level_empno = ? 
                WHERE tal.page_access_code IS NOT NULL OR tpa.page_access_code IN (1,2)
                ORDER BY tpa.page_access_group_id, tpa.page_access_code";
            
                $params = array($emp_no);
                $result = $dbConn->findQuery($sql, $params);
            
                $menuData = [];
                foreach ($result as $row) {
                    $groupID = $row['page_access_group_id'];
            
                    if (!isset($menuData[$groupID])) {
                        $menuData[$groupID] = [
                            'title' => $row['page_access_group_title'],
                            'items' => []
                        ];
                    }
            
                    $menuData[$groupID]['items'][] = [
                        'name' => $row['page_access_name'],
                        'link' => $row['page_access_link'],
                        'code' => $row['page_access_code'],
                        'group_icon'=> $row['page_access_group_icon'],
                        'icon' => $row['page_access_icon']

                    ];
                }
            
                return $menuData;
            }