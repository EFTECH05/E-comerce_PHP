<?php

include("../partials/connect.php");
$name=$_POST['name'];
$price=$_POST['price'];
$description=$_POST['description'];
$category=$_POST['category'];

if (isset($_POST['submit'])) {
//on windows : $target= __DIR__ . '/uploads/';
$file_path='uploads/'.basename($_FILES['file']['name']);
$file_name=$_FILES['file']['name'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_store= __DIR__ ."uploads/".$file_name;

$sql="INSERT INTO products(name,price,picture,description,category_id) VALUES('$name','$price','$file_path','$description','$category')";

$connect->query($sql);

if (move_uploaded_file($file_tmp, $file_store)) {
    echo "<h2> File upload successfully </h2>";
} else {
    echo "<h2> File not upload </h2>";
}

}

header('location: productsshow.php');

?>