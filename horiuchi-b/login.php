<?php

/* 入出力確認 */
$input_data1 = isset($_POST['text1']) ? htmlspecialchars($_POST['text1']) : null;
session_start();
$_SESSION["hidden_data2"] = $input_data1;
if ($input_data1 != '') {
    if (preg_match("/^[0-9]+$/", $input_data1)) {
        
    } else {
        header("Location:  reserveer.php");
    }
} else {
    header("Location:  reserveer.php");
}

/* ＩＤとパスワード照合 */
$dsn = 'mysql:dbname=tgsrdb;host=localhost';
$user = 'geru';
$password = 'n1242098';
$key = 0;
try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from gest';
    foreach ($dbh->query($sql) as $row) {
        if ($row['ID'] == $input_data1) {
            $key = 1;
        }
    }
} catch (PDOException $e) {
    header("Location: reserveer.php");
    die();
}
$dbh = null;
if ($key == 0) {
    header("Location: reserveer.php");
} else {
    header("Location:eat.php");
}
?>