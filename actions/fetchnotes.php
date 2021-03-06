<?php
session_start();
require_once(dirname(__FILE__) . '/../classes/user.php');
require_once(dirname(__FILE__) . '/../classes/document.php');
require_once(dirname(__FILE__) . '/../classes/version.php');
require_once(dirname(__FILE__) . '/../lib/utils.php');

$action = postVarClean("action");
$className = postVarClean("class_name");

$info = Document::getNotesAndUsersForClass($className);
if($info) echo json_encode($info);

else echo "0";

?>
