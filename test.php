<?php
include ('Model\Data\mysql.php');

$test= new MysqlConnector();
if(isset($_POST['login']) and isset($_POST['pass']))
{
    $bites =  $test->execStroredProcedureNonQuery("test",array($_POST['login'],$_POST['pass']));
}
?>
