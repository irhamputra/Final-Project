<hr>

<div class="container">

    <form class="form-signin" method="post">

        <h3 class="form-signin-heading">News & Deadlines form</h3>
        <label for="inputEmail" class="sr-only">Title</label>
        <input type="text" name="news[Title]" id="inputTitle" class="form-control" placeholder="Title"
               required autofocus>
        <br>

        <label for="inputPassword" class="sr-only">Description</label>
        <textarea name="news[Description]" id="inputDescription" class="form-control" placeholder="Description" required></textarea>
        <br>

        <label for="inputPassword" class="sr-only">Image URL <small>(Optional)</small></label>
        <input type="text" name="news[ImageUrl]" id="inputImageUrl" class="form-control" placeholder="Image URL (optional)">
        <br>

        <label for="inputPassword" class="sr-only">Description</label>
        <input type="text" name="news[Deadline]" id="inputDeadline" class="form-control" placeholder="Day/Month/Year"
               required>
        <br>

        <input type="hidden" name="news[newsForm]" value="true"/>
        <button class="btn btn-lg btn-primary btn-block" name="news[submit]" type="submit" value="send">Submit</button>
    </form>


    <h3 class="form-signin-heading">All News & Deadlines</h3>

    <?php
    echo '<pre>';
    print_r($this->news->allNews);
    echo '</pre>';
    ?>

</div> <!-- /container -->

