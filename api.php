<?php

$servername = "localhost";
$username = "MJStat";
$password = "123456789";
$dbname = "mjstat";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);




function TestSQL()
{
// 检测连接
global $conn;
if ($conn->connect_error) {
    return False;
} 
return True;
}

function add($name1, $val1, $name2, $val2, $name3, $val3, $name4, $val4)
{
    global $conn;
    $sql = sprintf("INSERT INTO `mjstat` (`Name1`, `Val1`, `Name2`, `Val2`, `Name3`, `Val3`, `Name4`, `Val4`, `Time`) VALUES ('%s', '%d', '%s', '%d', '%s', '%d', '%s', '%d', NOW())" , $name1, $val1, $name2, $val2, $name3, $val3, $name4, $val4);
    $ret = mysqli_query($conn, $sql);
    if (!$ret) {
        return False;
    } 
    else {
        return True;
    }
}

function getall()
{
    global $conn;
    $sql = "SELECT * FROM mjstat";
    $result = $conn->query($sql);
    return $result;
}



?>
