<?php
    include_once '/htdocs/sitepro/db/config.php';
    $nom = $_POST['nom'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    if(isset($nom)&&isset($message)&&isset($email)){
        $servername = DB::$servername;
        $username = DB::$username;
        $password = DB::$password;
        $dbname = DB::$dbname;
         
        // 创建连接
        //$link = mysql_connect($servername, $username, $password);
        //mysql_select_db('Contact');
        //mysql_query("set names 'utf8'");
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        } 
        //var_dump($conn);
        $sql = "INSERT INTO Contact VALUES ('$nom','$email','$message')";
        $result = $conn->query($sql);
        //$result = mysql_query($sql); 
        //var_dump($result);
        if($result){
           // echo "插入成功";
        }
        else{
            echo '插入失败';
        }
        $conn->close();
    //$_SESSION['contact'] = true;
    //header('Location: /Contacts.php');
     //include_once '../Contacts.php';
     setcookie ( "contact", "hascontacted", time () + 60*5 ,'/');
    }
    else {
        echo '禁止访问'.'请转到Contact页面'.'</br>';
        echo '<a href = "/Contacts">Contacts</a>';
    }
