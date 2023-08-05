<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_resident']))
{
    $resident_id = mysqli_real_escape_string($con, $_POST['delete_resident']);

    $query = "DELETE FROM resident WHERE id='$resident_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Resident Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Resident Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_resident']))
{
    $resident_id = mysqli_real_escape_string($con, $_POST['resident_id']);

    $flat = mysqli_real_escape_string($con, $_POST['flat']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE resident SET flat='$flat', name='$name', phone='$phone' WHERE id='$resident_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Resident Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Resident Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_resident']))
{
    $flat = mysqli_real_escape_string($con, $_POST['flat']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    

    $query = "INSERT INTO resident (flat,name,phone) VALUES ('$flat','$name','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Resident Created Successfully";
        header("Location: residents-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Resident Not Created";
        header("Location: residents-create.php");
        exit(0);
    }
}

?>