<?php
include "connection/connect.php";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;


$sqls = "DELETE FROM product WHERE category_id = $id";
$result = $connect->query($sqls);

$sql = "DELETE FROM category WHERE id = $id";
$result = $connect->query($sql);

if ($result) {
  echo "<script>window.open('index.php?page=category/index.php','_self')</script>";
}
