<?php

require("db.php");

$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);
//check table

$sql = $db->query("SELECT * FROM management");
if($sql)
{
    //check valid email 
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        ///check email from databse for management table
        $sql2 = $db->query("SELECT * FROM management WHERE email='$email'");
        if($sql2->num_rows !=0)
        {
            $sql3 = $db->query("SELECT * FROM management WHERE email='$email' AND password='$password'");
            if($sql3->num_rows !=0)
            {
                echo "success";
            }
            else
            {
                echo "wrong password";
            }
        }
        else
        {
            echo "email not found";
        }

    }
    else
    {
        echo "please fill write email address";
    }
}
else
{
    $createtable = $db->query("CREATE TABLE management(
    
    id int(255) not null auto_increment,
    email varchar(255),
    password varchar(255),
    primary key(id)
    )");
    if($createtable)
    {
        $store = $db->query("insert into management(email,password)values('admin@gmail.com','password')");
        if($store)
        {
            if(filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                ///check email from databse for management table
                $sql2 = $db->query("SELECT * FROM management WHERE email='$email'");
                if($sql2->num_rows !=0)
                {
                    $sql3 = $db->query("SELECT * FROM management WHERE email='$email' AND password='$password'");
                    if($sql3->num_rows !=0)
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "wrong password";
                    }
                }
                else
                {
                    echo "email not found";
                }
        
            }
            else
            {
                echo "please fill write email address";
            }
        }
        else
        {
            echo "data not inserted";
        }
    }
    else
    {
        echo "table not created";
    }
}


?>