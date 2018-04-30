<h1>Edition de <?=$post->title?></h1>

<form method="post">
  <div class="row">
      <label for="title">Titre</label>
      <input class="u-full-width" type="text" value="<?=$post->title?>"id="title" name="title">
      <label for="content">Contenu</label>
      <textarea class="u-full-width" id="content" name="content"><?=$post->content?></textarea>
    </div>
  <input class="button-primary" type="submit" value="Editer l'article">
</form>