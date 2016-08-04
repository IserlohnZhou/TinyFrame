    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>

                        <br><br>
                        <form action="/blog/search" method="POST" style="display: inline;">                                                  
                            <input type="text" value="" name="str" style="background:transparent;border:1px solid #ffffff" />
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                        </form>   
                  
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php foreach ($articles as $article) { ?>
                <div class="post-preview">
                    <a href=<?php echo "/blog/show/".$article['id'] ?> >
                        <h2 class="post-title">
                            <?php echo $article['title'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $article['body'] ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?php echo $article['username'] ?></a> on <?php echo $article['updated_at'] ?></p>
                </div>
                <hr>  
                <?php } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li class="previous">
                        <a href="#">&lt; Later Posts</a>
                    </li>
                    <li class="next">
                        <a href="#">Older Posts &gt;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

