<form id="myForm">
    <label for="mySearch">Rechercher un article</label>
    <input id="mySearch" type="text">
    <button type="submit" class="button-primary">Rechercher</button>
</form>
<hr>
    <div id="results">
        <?php foreach ($posts as $post) : ?>
            <h4><?= $post->title ?></h4>
            <p><?= $post->content ?></p>
        <?php endforeach; ?>
    </div>
<script src="<?= WEBSITE . 'public/js/app.js' ?>"></script>