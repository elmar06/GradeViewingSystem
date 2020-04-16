<?php
session_start();
if($_SESSION['access'] == 1)//Dean
{
    header('Location: ../pages/dean/Home.php');
}
elseif($_SESSION['access'] == 2)//Teacher
{
    header('Location: ../pages/teacher/Home.php');
}
elseif($_SESSION['access'] == 3)//Registrar
{
    header('Location: ../pages/registrar/Home.php');
}
else//student
{
    header('Location: ../pages/student/Home.php');
}
?>