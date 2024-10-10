<?php include '../views/components/header.php'; ?>

<section>
  <h2>Todas as postagens</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Conteúdo</th>
      <th>Assunto</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($posts as $post) { ?>
      <tr>
        <td><?php echo $post['id']; ?></td>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo $post['content']; ?></td>
        <td><?php echo $post['subject']; ?></td>
        <td>
          <a class="btn-edit" href="index.php?action=edit&id=<?php echo $post['id']; ?>">Editar</a>
          <a class="btn-remove" href="index.php?action=destroy&id=<?php echo $post['id']; ?>"
            onclick="return confirm('Tem certeza que deseja excluir este post?');">Excluir</a>
        </td>
      </tr>
    <?php } ?>
  </table>

  <div class="wrapper">
    <a class="btn" href="create_post_view.php">Cadastrar novo Post</a>
  </div>
</section>

<?php include '../views/components/footer.php'; ?>
