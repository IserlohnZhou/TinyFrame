    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="<?php echo "background-image: url('" .$article['cover_path']. "')" ?>" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $article['title'] ?></h1>
                        <h2 class="subheading"></h2>
                        <span class="meta">Posted by <a href="#"><?php echo $article['username'] ?></a> on <?php echo $article['updated_at'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php echo $article['body'] ?> 
                </div>
            </div>
        </div>
    </article>

    <hr>