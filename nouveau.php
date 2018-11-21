<?php
include 'sql/bdd_connection.php';

$query = $pdo->prepare
(
     'SELECT
     	FirstName,
     	LastName,
     	Id
     	FROM Author
     	
     '
);

$query->execute();
$auteurs = $query->fetchAll(PDO::FETCH_ASSOC);


$query = $pdo->prepare
(
     'SELECT
     	Id,
     	Name
     	FROM Category
     '
);

$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

$template = 'new';
include 'layout.phtml';
?>