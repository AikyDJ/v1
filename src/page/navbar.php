<?php include_once "../inc/fn.php";
$info = getinfo($_SESSION["id"]);
?>
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4 py-3 rounded mb-4 custom-navbar">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <img src="<?= $info['image_profil'] ?>" alt="profile-img" class="rounded-circle profile-picture border">
            <div>
                <h6 class="mb-0 fw-bold"><?= $info['nom'] ?></h6>
                <small class="text-muted"><?= $info['email'] ?></small>
            </div>
        </div>
        <div>
            <a href="../../index.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>
<style>
.profile-picture {
    width: 50px;
    height: 50px;
    object-fit: cover;
}
.custom-navbar {
    background: linear-gradient(to right, #f8f9fa, #e9ecef);
    border-radius: 12px;
}

</style>