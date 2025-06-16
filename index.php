<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crunch & Munch</title>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <?php if (!empty($message)): ?>
    <div class="toast-container position-fixed top-50 start-50 translate-middle p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="" class="rounded me-2" alt="...">
                <strong class="me-auto">Connexion réussi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $message; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="card col-sm m-3 p-3 text-center home-card">
                <h2>Munchies</h2>
                <img class="img-fluid" src="images/munchies.jpg" alt="Munchies">
            </div>
            <div class="card col-sm m-3 p-3 text-center home-card">
                <h2>Crunchies</h2>
                <img class="img-fluid" src="images/crunchies.jpg" alt="Crunchies">
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">
    </script>
    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const toastEl = document.getElementById('liveToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
    </script>
</body>

</html>