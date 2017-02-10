<hr>

<div class="container">

    <form class="form-signin" method="post">
        <h3 class="form-signin-heading">Register form</h3>
        <input type="text" name="signup[FirstName]" id="inputFirstName" class="form-control" placeholder="First Name"
               required autofocus>
        <br>
        <input type="text" name="signup[LastName]" id="inputLastName" class="form-control" placeholder="Last Name"
               required autofocus>
        <br>
        <input type="text" name="signup[Username]" id="inputUsername" class="form-control" placeholder="Username"
               required autofocus>
        <br>
        <input type="email" name="signup[Email]" id="inputEmail" class="form-control" placeholder="Email"
               required autofocus>
        <br>
        <input type="password" name="signup[Password]" id="inputPassword" class="form-control" placeholder="Password"
               required>
        <p class="pull-left" style="padding-right: 10px">Please choose: </p>
        <input type="radio" name="signup[Role]" value="Client" required> Client<br>
        <input type="radio" name="signup[Role]" value="Designer" required> Designer<br>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="toc" required autofocus> I agree with the terms of condition
            </label>
        </div>
        <input type="hidden" name="signup[usersForm]" value="true"/>
        <input class="btn btn-lg btn-primary btn-block" name="signup[submit]" type="submit" value="Sign up">
    </form>
</div>