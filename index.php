

  <?php include_once "connection.php" ?> 
  <?php
    // pripremamo upit
    $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC LIMIT 3";
    $statement = $connection->prepare($sql);

    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $posts = $statement->fetchAll();

?>
<?php include_once "partials/header.php"?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            
                <?php
                foreach ($posts as $post) {
            ?>

                <h1><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title'])?></a></h1>

                <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                <div class="va-c-article__meta">12. 6. 2017. by John Doe</div>

                <div>
                    <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt vitae molestias rem
                        repellendus commodi provident? Magnam, nobis quisquam perferendis consectetur deserunt
                        laboriosam pariatur a, eum suscipit ratione iusto ullam aperiam quas quod culpa dolore
                        corrupti voluptatem placeat enim commodi in.</p>
                </div>

            <?php
                }
            ?>    
             <div class="va-c-paginator">
                <a href="all-posts.php" title="All posts">All posts</a>
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include_once "partials/sidebar.php"?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once "partials/footer.php"?>

