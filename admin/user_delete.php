<?php
if(array_key_exists('id', $_GET) && is_numeric($_GET['id'])){
	require_once('class.db.php');
    $database = new DB();

    //get id client want update
    $id = $_GET['id'];

    // $database->delete('groups', array('id' => $id));
    $database->update('users', array('status' => 0), array('id'=>$id));
}
    
header("Location: user_index.php"); die;