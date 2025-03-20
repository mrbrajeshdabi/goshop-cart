<?php
$db = new mysqli("localhost","root","","shoper");
if($db->connect_error)
{
  die("check your server");
}
?>