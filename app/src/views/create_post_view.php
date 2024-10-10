<?php include '../views/components/header.php'; ?>

<section>
  <h2>Criar novo Post</h2>
  <form action="index.php?action=store" method="POST">
    <div class="wrapper-input">
      <input placeholder="Titulo" type="text" id="title" name="title" required>
    </div>

    <div class="wrapper-input">
      <textarea placeholder="Conteúdo" id="content" name="content" required></textarea>
    </div>

    <div class="wrapper-input">
      <input placeholder="Assunto" type="text" id="subject" name="subject" required>
    </div>

    <div class="wrapper">
      <button class="btn" type="submit">Salvar Post</button>
    </div>
  </form>
</section>

<?php include '../views/components/footer.php'; ?>