<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title ?? "Saint Gilles Hospital - Patient Management") ?></title>

  <meta name="description"
    content="<?= htmlspecialchars($description ?? "An intuitive interface to manage patients and appointments at Saint Gilles Hospital.") ?>" />
  <meta name="author" content="Maxime Germis" />

  <link rel="icon" type="image/png" sizes="76x76" href="./public/assets/logos/logo-128.png" />

  <link rel="stylesheet" href="./public/css/variables.css" />
  <link rel="stylesheet" href="./public/css/style.css" />
  <link id="mode" rel="stylesheet" href="./public/css/light-mode.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <link rel="manifest" href="./public/manifest.json" />
</head>

<body>
  <?php require_once('header.php') ?>

  <main class="container">
    <?= $content ?? "<p>Content not found.</p>"; ?>
  </main>

  <?php require_once('footer.php') ?>
  <!-- Script JS -->
  <script type="module" src="./public/js/modules/<?= htmlspecialchars($scriptName ?? 'default.js') ?>"></script>
  <script type="module" src="./public/js/modules/functions.js"></script>
  <script>
    window.addEventListener('load', () => {
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('./public/service-worker.js');
      }
    });
  </script>
</body>

</html>
