<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>accueil">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>votes">Votes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br>
  <div class="container text-center">
          <img src="https://images.pexels.com/photos/4669108/pexels-photo-4669108.jpeg?cs=srgb&dl=pexels-cottonbro-4669108.jpg&fm=jpg" alt="imgvote" style="
          height:150px;">
        </div>

  <?php
  if (!empty($_SESSION['alert'])) {
  ?>
    <div class="container mt-3">
      <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center">
        <?= $_SESSION['alert']['msg'] ?>
      </div>
    </div>
  <?php
    unset($_SESSION['alert']);
  }
  ?>

  <div class="container">
    <h1 class="rounded border border-dark m-2 p-2 text-center text-white bg-info"><?= $titre ?></h1>
    <?= $content; ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>