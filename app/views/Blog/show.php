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
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <br><br>
                    <h2><?php echo $comment_title ?></h2>
                    <hr>
                    <?php foreach ($comments as $comment) { ?>
                        <h3><?php echo $comment['nickname']?>:</h3>
                        <span><?php echo $comment['content']?></span>
                        <h5 style="font-weight:lighter;">Posted on <?php echo $comment['updated_at']?></h5>
                        <hr>
                    <?php } ?>
                </div>
                <div class="col-lg-6 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2 style="font-weight:normal;">Leave a comment</h2>
                    <br>
                    <form action="/blog/comment_store" method="POST" > 
                        <input type="hidden" name="article_id" value=<?php echo $article['id'] ?> >                                         
                        <input class="form-control" type="text" value="" name="nickname" placeholder="nickname" required="required"/>
                        <br>
                        <textarea class="form-control"name="content" rows="8" id="newFormContent" placeholder="Content" required="required"></textarea>
                        <br>
                        <input type="submit" class="btn btn-sm " value="SEND"/>
                    </form>   
                </div>
            </div>
        </div>
    </article>
