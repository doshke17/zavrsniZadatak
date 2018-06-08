<script> function myButton() {
    var button = document.getElementById("buttonD");
    var comments = document.getElementById("comments");
    if (button.innerHTML === "Hide comments") {
        button.innerHTML = "Show comments";
        comments.style.display="none";
    } else if(button.innerHTML === "Show comments") {
        button.innerHTML = "Hide comments";
        comments.style.display="block";
    }
}
</script>
<?php include_once "partials/header.php"?>
<?php include_once "connection.php" ?> 
<?php
    $sql = "SELECT posts.id, posts.title, posts.body, posts.author, posts.created_at,
  comments.id AS comment_id, comments.author AS comment_author, comments.text AS comment_text, comments.post_id AS comment_post_id FROM posts 
  LEFT JOIN comments ON posts.id=comments.post_id WHERE posts.id =" . $_GET["post_id"];

    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $post = $statement->fetch();
?>
<main role="main" class="container">
        <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"> <a href = "single-post.php?id=<?php echo($post['id']) ?>"><?php echo ($post["title"])?> </a></h2>
                <p class="blog-post-meta"><?php echo ($post["created_at"])?> <a href="#"><?php echo ($post["author"])?></a></p>
                <p><?php echo ($post["body"])?></p>
                <form action="partials/createComment.php" method="POST">
                    Name: <input type="text" name="name"> <br>
                    <input type="hidden" name="postId" value="<?php echo $post['id'] ?>">
                    <textarea name="comment">Enter text here!!!</textarea>
                    <input type="submit" name="submit">
                </form>

                <button id="buttonD" type="button" class="btn btn-default" onclick="myButton()">Hide comments</button>
                <div id="comments">
                    <ul> 
                        <li class="blog-comments-meta"><?php echo ($post["comment_author"])?></li>
                        <li class="blog-comments-meta"><?php echo ($post["comment_text"])?></li>
                    </ul>
               </div>
            </div>
        </div>
    </div>
</main>
