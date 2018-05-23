<div class="container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1" >
            <h2>Member Login</h2>
            <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <?php $this->loadPartialView("../includes/_message") ?>
                <form action="" method="post">
                    <input type="email" placeholder="E-Mail" name="email" />
                    <input type="Password" placeholder="Password" name="password"/>
                    <span>
                        <input type="checkbox" class="checkbox"> 
                        Keep me signed in
                    </span>
                    <br/>
                    <a href="<?php echo LINK_URL ?>member/forgotPassword.html">Forgot Password</a>
                    <button type="submit" class="btn btn-default" name="login">Login</button>
                </form>
            </div><!--/login form-->
            <p>------------ OR ------------</p>
          <a href="<?php echo LINK_URL?>member/fblogin" class="btn btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
        </div>
    </div>
</div>
<div class="social-auth-links text-center">
        </div><!-- /.social-auth-links -->