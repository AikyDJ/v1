<?php include_once "../inc/fn.php";
$info = getinfo($_SESSION["id"]);
?>
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<div class="container mt-4">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-3 p-3 custom-navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="<?= htmlspecialchars($info['image_profil']) ?>" alt="Profile" class="profile-picture rounded-circle border border-2">
                <div>
                    <h5 class="fw-semibold text-dark mb-1"><?= htmlspecialchars($info['nom']) ?></h5>
                    <p class="text-muted small mb-0"><?= htmlspecialchars($info['email']) ?></p>
                </div>
            </div>
            <a href="../../index.php" class="">

                <button>
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front text"> Logout
                    </span>
                </button>
            </a>



        </div>
    </nav>
</div>

<style>
    .profile-picture {
        width: 55px;
        height: 55px;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .profile-picture:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .custom-navbar {
        background: linear-gradient(135deg, #ffffff, #f1f3f5);
        border: 1px solid #dee2e6;
    }

    h5,
    p {
        margin-bottom: 0;
        font-family: 'Courier New', Courier, monospace;
        font-size: larger;
    }

    button {
        position: relative;
        border: none;
        background: transparent;
        padding: 0;
        cursor: pointer;
        outline-offset: 4px;
        transition: filter 250ms;
        user-select: none;
        touch-action: manipulation;
    }

    .shadow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        background: hsl(0deg 0% 0% / 0.25);
        will-change: transform;
        transform: translateY(2px);
        transition: transform 600ms cubic-bezier(.3, .7, .4, 1);
    }

    .edge {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        background: linear-gradient(to left,
                hsl(340deg 100% 16%) 0%,
                hsl(340deg 100% 32%) 8%,
                hsl(340deg 100% 32%) 92%,
                hsl(340deg 100% 16%) 100%);
    }

    .front {
        display: block;
        position: relative;
        padding: 12px 27px;
        border-radius: 12px;
        font-size: 1.1rem;
        color: white;
        background: hsl(345deg 100% 47%);
        will-change: transform;
        transform: translateY(-4px);
        transition: transform 600ms cubic-bezier(.3, .7, .4, 1);
    }

    button:hover {
        padding: +1px;
    }
</style>