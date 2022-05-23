<?php
require_once "api.php";
function new_to_here()
{
    //var_dump($_POST);
    $msg  = 
    "<form method = \"POST\" action = \"index.php\"> 
    <div align=\"center\" style=\"font-size:24\">
        请输入第一名姓名 <input type = \"text\" id =\"name1\" name=\"name1\" style=\"width:300;height:25;\"> </input> 得分 <input type = \"number\" step=\"1\" id =\"val1\" name=\"val1\" style=\"width:80;height:25;\"> </input><br>
        请输入第二名姓名 <input type = \"text\" id =\"name2\" name=\"name2\" style=\"width:300;height:25;\"> </input> 得分 <input type = \"number\" step=\"1\" id =\"val2\" name=\"val2\" style=\"width:80;height:25;\"> </input><br>
        请输入第三名姓名 <input type = \"text\" id =\"name3\" name=\"name3\" style=\"width:300;height:25;\"> </input> 得分 <input type = \"number\" step=\"1\" id =\"val3\" name=\"val3\" style=\"width:80;height:25;\"> </input><br>
        请输入第四名姓名 <input type = \"text\" id =\"name4\" name=\"name4\" style=\"width:300;height:25;\"> </input> 得分 <input type = \"number\" step=\"1\" id =\"val4\" name=\"val4\" style=\"width:80;height:25;\"> </input><br>
        <input type = \"hidden\" id =\"method\" name=\"submit\" > </input>
        <input type=\"submit\" value=\"确认\">
        </div>
    </form>  ";
    echo $msg;
    showall();

}

function addstat()
{
    if(!(array_key_exists("name1", $_POST) and array_key_exists("val1", $_POST) 
    and array_key_exists("name2", $_POST) and array_key_exists("val2", $_POST) 
    and array_key_exists("name3", $_POST) and array_key_exists("val3", $_POST)
    and array_key_exists("name4", $_POST) and array_key_exists("val4", $_POST)  ))
    {
        echo "参数错误<br>";
        return new_to_here();
    }
    $name1 = $_POST["name1"];$val1 = $_POST["val1"];
    $name2 = $_POST["name2"];$val2 = $_POST["val2"];
    $name3 = $_POST["name3"];$val3 = $_POST["val3"];
    $name4 = $_POST["name4"];$val4 = $_POST["val4"];
    (add($name1, $val1, $name2, $val2, $name3, $val3, $name4, $val4));

    new_to_here();
}


function showall()
{
    $result = getall();
    //var_dump($result);
    echo '<table width="800" style="font-size:24" border="1" cellspacing="1" cellpadding="4" class="tabtop13" align="center" ><tbody>';
    echo '<tr>
        <th bgcolor="#cccccc" width="20%">时间</th>
        <th bgcolor="#cccccc" width="10%">名称</th><th bgcolor="#cccccc" width="10%">得分</th>
        <th bgcolor="#cccccc" width="10%">名称</th><th bgcolor="#cccccc" width="10%">得分</th>
        <th bgcolor="#cccccc" width="10%">名称</th><th bgcolor="#cccccc" width="10%">得分</th>
        <th bgcolor="#cccccc" width="10%">名称</th><th bgcolor="#cccccc" width="10%">得分</th>          </tr>';
        if ($result->num_rows > 0) {
            // 输出数据
        
            while($row = $result->fetch_assoc()) {
                //var_dump($row);
                $name1 = $row["Name1"];$val1 = $row["Val1"];
                $name2 = $row["Name2"];$val2 = $row["Val2"];
                $name3 = $row["Name3"];$val3 = $row["Val3"];
                $name4 = $row["Name4"];$val4 = $row["Val4"];
                $time = $row["Time"];
                echo "<tr align='center' bgcolor='#FFFFFF'>
                <td>" . $time . "</td>
                <td>" . $name1 . "</td> <td>" . $val1 . "</td>
                <td>" . $name2 . "</td> <td>" . $val2 . "</td>
                <td>" . $name3 . "</td> <td>" . $val3 . "</td>
                <td>" . $name4 . "</td> <td>" . $val4 . "</td></tr>";
            }
            
        } 
        echo "</tbody></table>";

}


if (isset($_POST) and array_key_exists("submit", $_POST))
{
addstat();
}
else
{
    new_to_here();
}

?>