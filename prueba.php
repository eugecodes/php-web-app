<?php
$conn = mysql_connect('localhost', 'emil_isadora', 'IZBDw2zlP0Nr');
mysql_select_db('emil_isadora', $conn);

$result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))
                {
                    echo $row;
                }