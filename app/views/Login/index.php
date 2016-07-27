   <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <?php
                        session_start();
                        if (isset($_SESSION['login_err'])){
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['login_err'];unset($_SESSION['login_err']); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <form class="form-horizontal" role="form" method="POST" action="/checklogin.php">
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="username" >
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    if (isset($_SESSION['username_err'])){
                                    ?>
                                        <span class="help-block" style="color:#D00000; ">
                                            <strong><?php echo $_SESSION['username_err'];unset($_SESSION['username_err']); ?></strong>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>    
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-3">
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="col-md-4">
                                   <?php
                                    if (isset($_SESSION['password_err'])){
                                    ?>
                                        <span class="help-block" style="color:#D00000; ">
                                            <strong><?php echo $_SESSION['password_err'];unset($_SESSION['password_err']); ?></strong>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>    
                            </div>



                            <div class="form-group">
                                <label for="captcha" class="col-md-4 control-label">Captcha</label>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="captcha" > 
                                </div>
                                <div class="col-md-1">
                                    <img id="checkpic" onclick="changing();" src='captcha.php'/>
                                    <script>
                                        function changing(){
                                            document.getElementById('checkpic').src="captcha.php?"+Math.random();
                                        } 
                                    </script>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    if (isset($_SESSION['captcha_err'])){
                                    ?>
                                        <span class="help-block" style="color:#D00000; ">
                                            <strong><?php echo $_SESSION['captcha_err'];unset($_SESSION['captcha_err']); ?></strong>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

