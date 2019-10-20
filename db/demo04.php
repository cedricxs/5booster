<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    echo $user,$pwd;
    if(isset($user) & isset($pwd))
    {
    $servername = "185.98.131.92";
    $username = "5boos1240679";
    $password = "260074";
    $dbname = "5boos1240679";
     
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    $sql = "select count(*) from test";
    $result = $conn->query($sql);
    $count = $result->fetch_assoc()["count(*)"];
    $index = $count + 1;
    $sql = "INSERT INTO `test` (`username`, `pwd`, `id`) VALUES ($user, $pwd, $index);";
    $result = $conn->query($sql);
    if($result){
        echo "插入成功";
    }
    $sql = "SELECT username, pwd, id FROM test";
    $result = $conn->query($sql);
    echo "<table> <tr> <th>id</th> <th>username</th> <th>pwd</th></tr>"; 
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "<tr> <td>" . $row["id"]. "</td> <td>" . $row["username"]. "</td> <td>" . $row["pwd"]. "</td></tr>";
        }
    } else {
        echo "0 结果";
    }
    echo "</table>" ;
    $conn->close();
    }
    else {
        echo '禁止访问'.'请转到demo.html'.'</br>';
        echo '<a href = "demo.html">demo.html</a>';
    }
?>

</body>
</html>