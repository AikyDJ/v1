<?php include_once "../inc/fn.php";
$info = getinfo($_SESSION["id"]);
?>
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<div class="container-head" >

    <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-3 p-3 custom-navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="<?= htmlspecialchars($info['image_profil']) ?>" alt="Profile" class="profile-picture rounded-circle border border-2">
                <div>
                    <h5 class="fw-semibold text-dark mb-1">NOM :<?= htmlspecialchars($info['nom']) ?></h5>
                    <p class="text-muted small mb-0">EMAIL :<?= htmlspecialchars($info['email']) ?></p>
                </div>
            </div>
            <a href="../../index.php" class="">

                <button>
                    Logout
                </button>
            </a>



        </div>
    </nav>
</div>

<style>
    .container-head{
        display: inline;
        top: 0;
        height: 150px;
    }
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
        border: none;
        outline: none;
        background-color: #6c5ce7;
        padding: 10px 20px;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        border-radius: 5px;
        transition: all ease 0.1s;
        box-shadow: 0px 5px 0px 0px #a29bfe;
        float: right;
    }

    button:active {
        transform: translateY(5px);
        box-shadow: 0px 0px 0px 0px #a29bfe;
    }
</style>