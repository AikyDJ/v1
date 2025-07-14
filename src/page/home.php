<?php include_once "../inc/fn.php";
$DATA = getPublication();
?>

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Welcome to the Home Page</h1>
        <p class="text-muted">Here you can find all the latest publications.</p>
    </div>

    <div class="row g-4">
        <?php if ($DATA): ?>
            <?php foreach ($DATA as $publication): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($publication['nom_objet']) ?></h5>
                            <p class="card-text">
                                <span class="badge bg-secondary">Category ID: <?= htmlspecialchars($publication['objet_categorie']) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">No publications found.</div>
            </div>
        <?php endif; ?>
    </div>
</div>
<style>
    .card-title {
        font-weight: 600;
        color: #333;
    }
</style>