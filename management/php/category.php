<?php
require("db.php");
$category = mysqli_real_escape_string($db,strtoupper($_POST["category"]));
$caturl = str_replace(" ","-",$category);
$caturl = strtolower($caturl);
$time = Date("Y-m-d");

//check table from database
$chktable = $db->query("SELECT * FROM category");
if($chktable)
{
    $store = $db->query("INSERT INTO category(category_name,category_url,create_category)VALUES('{$category}','{$caturl}','{$time}')");
    if($store)
    {
      echo "Category Add SuccessFully";
    }
    else
    {
      echo "Data Not Store From Category";
   }
}
else
  {
      $createtable = $db->query("CREATE TABLE category(
      id INT(255) NOT NULL AUTO_INCREMENT,
      category_name VARCHAR(255),
      category_url VARCHAR(255),
      create_category VARCHAR(255),
      PRIMARY KEY(id)
      )");
      if($createtable)
      {
        $store = $db->query("INSERT INTO category(category_name,category_url,create_category)VALUES('{$category}','{$caturl}','{$time}')");
        if($store)
        {
          echo "Category Add SuccessFully";
        }
        else
        {
          echo "Data Not Store From Category";
        }
      }
      else
      {
        echo "table not created";
      }
    }


?>