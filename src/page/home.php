<?php 
include_once "../inc/fn.php";

$DATA = isset($_POST["categorie"]) ? getPublicationByCategory($_POST["categorie"]) : getPublication();
$DATAcat = getCategories();
?>

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<div class="container my-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Welcome to the Home Page</h1>
        <p class="text-muted">Here you can find all the latest publications.</p>
    </div>

    <form action="./index.php?page=home" method="POST" class="row g-3 align-items-end mb-4">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <label for="categorie" class="form-label fw-semibold">Filter by Category</label>
            <select name="categorie" id="categorie" class="form-select">
                <option value="">All Categories</option>
                <?php foreach ($DATAcat as $cat): ?>
                    <option value="<?= htmlspecialchars($cat['id_categorie']) ?>">
                        <?= htmlspecialchars($cat['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">
                Filter
            </button>
        </div>
    </form>

    <div class="row g-4">
        <?php if ($DATA): ?>
            <?php foreach ($DATA as $publication): ?>
                <div class="col-md-6 col-lg-4" style="background-color:rgb(147, 166, 185);">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition rounded-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($publication['nom_objet']) ?></h5>
                            <p class="card-text">
                                <span class="badge bg-secondary">
                                    Category ID: <?= htmlspecialchars($publication['objet_categorie']) ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No publications found.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


<style>
    .card-title {
        font-weight: 600;
        color: #2c3e50;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .transition {
        transition: all 0.3s ease-in-out;
    }

    .hover-shadow:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15) !important;
    }
</style>
