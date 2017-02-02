<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>

        <label for="inputEmail" class="sr-only">Email address</label>

        <input type="text" name="login['username']" id="inputUsername" class="form-control" placeholder="Username"
               required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>

        <input type="password" name="login['password']" id="inputPassword" class="form-control" placeholder="Password"
               required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input type="hidden" name="login[loginForm]" value="true"/>
        <button class="btn btn-lg btn-primary btn-block" name="login['submit']" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
