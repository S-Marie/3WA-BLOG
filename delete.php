<?php

include 'sql/bdd_connection.php';


$query = $pdo->prepare
(
	'DELETE FROM Post
	 WHERE Id = ?'
);

$query->execute(array($_GET['id']));

header('Location: admin.php');
exit();
?>