<hr>

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Contact us</h2>

        <label for="firstname" class="sr-only">First Name</label>
        <input type="text" name="contact[Firstname]" id="firstname" class="form-control" placeholder="First Name"
               required autofocus>
        <br>
        <label for="lastname" class="sr-only">Last Name</label>
        <input type="text" name="contact[Lastname]" id="lastname" class="form-control" placeholder="Last Name"
               required autofocus>
        <br>

        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="contact[email]" id="email" class="form-control" placeholder="Email"
               required autofocus>
        <br>

        <label for="message" class="sr-only">Message</label>

        <textarea name="contact[Message]" id="message" placeholder="Say Hi to us!" required autofocus style="width: 301px; height: 46px;"></textarea>
        <input type="hidden" name="contact[contactform]" value="true"/>

        <br>

        <button class="btn btn-lg btn-primary btn-block" name="contact[submit]" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
