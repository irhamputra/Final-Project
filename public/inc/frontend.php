<nav>
    <ul>
        <?php foreach (\classes\core\App::$nav['frontend'] as $param => $link) : ?>
            <li><a href="?p=<?= $param ?>"><?= $link ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>