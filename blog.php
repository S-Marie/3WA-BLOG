<?php

include 'bdd_connection.php'

$query = $pdo->prepare
(
     'SELECT
     	Title,
     	Post.Id, 
     	Contents, 
     	CreationTimestamp,
     	FirstName,
     	LastName
		FROM Post
		INNER JOIN Author ON Post.Id = Author.Id
		WHERE Id = ?
		ORDER BY CreationTimestamp DESC'
);

$query->execute(array($_GET['id']));
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

print_r($posts);
?>