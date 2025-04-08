<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>
<script>
  // Register the Service Worker
  window.addEventListener("load", () => {
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker
        .register("./service-worker.js")
        .then(() => console.log("Service Worker registered successfully."))
        .catch((error) =>
          console.error("Service Worker registration failed:", error)
        );
    }
  });
</script>

</html>