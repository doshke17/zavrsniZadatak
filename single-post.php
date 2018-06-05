
<?php include_once "partials/header.php"?>
<?php include_once "connection.php" ?> 
<?php
    $sql = "SELECT id, title, body, author, created_at FROM posts WHERE posts.id =" . $_GET["post_id"];
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $post = $statement->fetch();

    // koristite var_dump kada god treba da proverite sadrzaj neke promenjive

?>

<main role="main" class="container">
        <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"> <a href = "single-post.php?id=<?php echo($post['id']) ?>"><?php echo ($post["title"])?> </a></h2>
                <p class="blog-post-meta"><?php echo ($post["created_at"])?> <a href="#"><?php echo ($post["author"])?></a></p>
                <p><?php echo ($post["body"])?></p>
            </div>
        </div>
    </div>
</main><!-- /.container -->

     
        
 
    