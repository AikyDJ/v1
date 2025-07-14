<?php include_once "../inc/fn.php";
$info = getinfo($_SESSION["id"]);
?>
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<div class="container mt-4">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-3 p-3 custom-navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="<?= $info['image_profil'] ?>" alt="Profile" class="rounded-circle border border-2">
                <div>
                    <h5 class="mb-1 fw-semibold text-dark"><?= htmlspecialchars($info['nom']) ?></h5>
                    <p class="mb-0 text-muted small"><?= htmlspecialchars($info['email']) ?></p>
                </div>
            </div>

            <div>
                <a href="../../index.php" class="btn btn-sm btn-outline-danger px-3">
                    Logout
                </a>
            </div>

        </div>
    </nav>
</div>

<style>
    .profile-picture {
        width: 55px;
        height: 55px;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-navbar {
        background: linear-gradient(135deg, #ffffff, #f1f3f5);
        border: 1px solid #dee2e6;
    }

    h5, p {
        margin-bottom: 0;
    }
</style>
