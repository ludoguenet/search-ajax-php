<h1>Administration</h1>
<a class="button button-primary" href="admin/posts/create">Créer un post</a>
<table class="u-full-width">
  <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
      <th>Contenu</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($posts as $post): ?>
    <tr>
      <td><?=$post->id?></td>
      <td><?=$post->title?></td>
      <td><?=$post->content?></td>
      <td>
        <form action="admin/posts/delete" method="post">
        <input type="hidden" name="id" value="<?=$post->id?>">
        <button type="submit" onclick="return confirm('Suppression de ce post?');">Supprimer</button>
      </form>
      <a href="admin/posts/edit/<?=$post->id?>" class="button">Editer</a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>


