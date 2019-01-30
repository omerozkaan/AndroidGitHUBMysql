<?php
        $username=$_POST["username"];
        $password=$_POST["password"];
       
        $servername = "10.10.1.10";
        $user = "demo";
        $pass = "demo123456";
        $dbname = "PrinterDemo";
        $isExist=false;
 
        $conn = new mysqli($servername, $user, $pass, $dbname);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM uyeler where username='$username'";
        $result = $conn->query($sql);
 
        if ($result->num_rows > 0)
        {
                $isExist=true;
                $conn->close();
                echo 'Böyle bir kullanıcı zaten mevcut';
        }
        else
        {
            $conn->close();
            $conn2 = new mysqli($servername, $user, $pass, $dbname);
           if ($conn2->connect_error)
            {
                die("Connection failed: " . $conn2->connect_error);
            }
            $sql2 = "INSERT INTO uyeler (username, password) VALUES ('$username', '$password')";
            if ($conn2->query($sql2) === TRUE)
            {
                echo "Kullanıcı başarıyla kaydedildi!";
            }
            else
            {
                echo "Error: " . $sql2 . "<br>" . $conn2->error;
            }
            $conn2->close();
        }
    ?>
