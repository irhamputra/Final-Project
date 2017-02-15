<hr>

<div class="container">

    <form class="form-signin" method="post">
        <h3 class="form-signin-heading">Please sign in <span class="glyphicon glyphicon-log-in"
                                                             aria-hidden="true"></span></h3>

        <input type="text" name="login[Username]" id="inputUsername" class="form-control" placeholder="Username"
               required autofocus>
        <br>

        <input type="password" name="login[Password]" id="inputPassword" class="form-control" placeholder="Password"
               required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input type="hidden" name="login[loginForm]" value="true"/>
        <button class="btn btn-lg btn-primary btn-block" name="login[submit]" type="submit">Sign in</button>
    </form>
    <p class="text-center">Don't have an account? <a class="btn btn-xs btn-primary" href="?p=signup" role="button">Sign
            Up Now!</a></p>

</div> <!-- /container -->
