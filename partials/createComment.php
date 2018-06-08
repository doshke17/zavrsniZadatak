
<?php include_once "../connection.php" ?> 
<?php
    if (isset($_POST["submit"])) {
        if (empty($_POST["name"]) || empty($_POST["comment"])) {
            header('Location: ../single-post.php?post_id='.$_POST['postId'].'&error=1');
        } else {
            $postId = $_POST['postId'];
            $comment = "INSERT INTO comments (id, author, text, post_id) VALUES (15, 'Mile', 'brateeeee', '$postId')";
            $statement = $connection->prepare($comment);
            $statement->execute();

            header('Location: ../single-post.php?post_id='.$_POST['postId']);

        }
    }           
?>