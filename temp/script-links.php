<!-- Script JS -->
<script  src="./JS/functions.js"></script>
<script>
    window.addEventListener('load', () => {
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('./service-worker.js');
        }
    });
</script>
