<?php

include 'sql/bdd_connection.php';

if(empty($_POST)){

	if(!array_key_exists('id', $_GET) || !ctype_digit($_GET['id']))
        {
            header('Location: index.php');
            exit();
        }
      
        $query = $pdo->prepare(
        '
            SELECT
                Id,
                Title,
                Contents
            FROM
                Post
            WHERE
                Id = ?
        ');


        $query->execute([$_GET['id']]);
        $posts = $query->fetch(PDO::FETCH_ASSOC);

        $template = 'update';
        include 'layout.phtml';

} else {
    	 $query = $pdo->prepare(
            '
                UPDATE
                    Post
                SET
                    Title = ?,
                    Contents = ?
                WHERE
                    Id = ?
            ');

        $query->execute([$_POST['title'], $_POST['contents'], $_POST['postId']]);

        header('Location: admin.php');
        exit();

    }


?>