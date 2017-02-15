<hr>

<div class="container">
    <?php if ($_SESSION["role"] == "Client" or $_SESSION["id"] == "1") : ?>

        <form class="form-signin" method="post">

            <h3 class="form-signin-heading">News & Deadlines form</h3>

            <label for="inputEmail" class="sr-only">Title</label>
            <input type="text" name="news[Title]" id="inputTitle" class="form-control" placeholder="Title"
                   required autofocus>
            <br>

            <label for="inputPassword" class="sr-only">Description</label>
            <textarea name="news[Description]" id="inputDescription" class="form-control" placeholder="Description"
                      required></textarea>
            <br>

            <label for="inputPassword" class="sr-only">Image URL
                <small>(Optional)</small>
            </label>
            <input type="text" name="news[ImageUrl]" id="inputImageUrl" class="form-control"
                   placeholder="Image URL (optional)">
            <br>

            <label for="inputPassword" class="sr-only">Description</label>
            <input type="text" name="news[Deadline]" id="inputDeadline" class="form-control"
                   placeholder="Day/Month/Year"
                   required>
            <br>

            <input type="hidden" name="news[newsForm]" value="true"/>
            <button class="btn btn-lg btn-primary btn-block" name="news[submit]" type="submit" value="send">Submit
            </button>
        </form>

    <?php endif; ?>


    <h3 class="form-signin-heading">All News & Deadlines</h3>

    <?php foreach ($this->news->allNews as $key_row => $news_entry) : ?>
        <div class="form-signin-heading">
            <h6>Date: <?= $news_entry['news_timestamp'] ?></h6>
            <h4><?= $news_entry['news_title'] ?></h4>
            <p><?= $news_entry['news_description'] ?></p>
            <p>Image URL: <a><?= $news_entry['news_image_url'] ?></a></p>
            <h5>Deadline: <?= $news_entry['news_deadline'] ?></h5>
            <hr style="border-color:black">
        </div>
    <?php endforeach; ?>

</div> <!-- /container -->


