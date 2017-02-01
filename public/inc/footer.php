<div class="container">
    <hr>
    <nav class="navbar">
        <ul class="nav navbar-nav">
            <?php foreach (\classes\core\App::$nav['footer'] as $param => $link) : ?>
                <li><a href="?p=<?= $param ?>"><?= $link ?></a></li>
            <?php endforeach; ?>
            <p>&copy; 2016 Company, Inc.</p>
        </ul>
    </nav>

</div><!--/.container-->