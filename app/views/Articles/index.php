<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Articles
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_SESSION['article_err'])){
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['article_err'];unset($_SESSION['article_err']); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <a href="/articles/create" class="btn btn-lg btn-primary">Add</a>
                    <?php 
                    // require("../../lib/mysql/Mysql.class.php");
                    // $page=isset($_GET['page'])?intval($_GET['page']):1;
                    // $offset=($page-1)*5;
                    // $mysql=new db_mysql;
                    // $total=mysql_num_rows($mysql->query("select * from articles where state=1")); 
                    // $pagenum=ceil($total/5);
                    // If($page>$pagenum || $page == 0){
                    //     $_SESSION['article_err']="Error : Can Not Found The page";
                    //     header("Location:/articles/index");
                    //     exit;
                    // }
                    // $sql="select * from articles where state=1 limit {$offset},5";
                    // $articles=$mysql->fetch($sql);
                    foreach ($articles as $article) {
                    ?>
                        <hr>
                        <div class="article">
                            <h4><?php echo $article['title'] ?></h4>
                            <div class="content" style="word-break: break-all; ">
                                <p>
                                    <?php echo $article['body'] ?>
                                </p>
                            </div>
                        </div>
                        <form action=<?php echo "/articles/edit/".$article['id'] ?> method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>                            
                        <form action=<?php echo "/articles/delete/".$article['id'] ?>  method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    <?php 
                    } 
                    ?>
                </div>
            </div>
            <div style="text-align:center;">
<!--                 <ul class="pagination">
                <?php 
                    if ($page>1){
                        $show="<li><a href='/articles/index?page=".($page-1)."'>&laquo;</a></li>";
                        Echo $show;
                    }
                    For($i=1;$i<=$pagenum;$i++){
                        $show=($i!=$page)?"<li><a href='/articles/index?page=".$i."'>$i</a></li>":"<li><a>$i</a></li>";
                        Echo $show;
                    }
                    if ($page<$pagenum){
                        $show="<li><a href='/articles/index?page=".($page+1)."'>&raquo;</a></li>";
                        Echo $show;
                    }
                ?> 
                </ul>      -->   
            </div>
        </div>
    </div>
</div> 
</body>