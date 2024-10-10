<?php include '../views/components/header.php'; ?>

<section>
  <h2>Editar Post</h2>
  <form action="index.php?action=update" method="POST">
    <input type="hidden" name="id" value="<?php echo $post['id'] ?>">

    <div class="wrapper-input">
      <input placeholder="Titulo" type="text" id="title" name="title" required value="<?php echo $post['title'] ?>">
    </div>

    <div class="wrapper-input">
      <textarea placeholder="Conteúdo" id="content" name="content" required><?php echo $post['content']; ?></textarea>
    </div>

    <div class="wrapper-input">
      <input placeholder="Assunto" type="text" id="subject" name="subject" required value="<?php echo $post['subject'] ?>">
    </div>

    <div class="wrapper">
      <button class="btn" type="submit">Editar Post</button>
    </div>
  </form>
</section>

<?php include '../views/components/footer.php'; ?>