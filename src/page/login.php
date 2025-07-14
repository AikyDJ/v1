<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>

<body>
    <div class="container">
        <form class="form" action="../inc/t_login.php" method="post">
            <div class="title">Welcome,<br><span>sign up to continue</span></div>
            <input type="email" placeholder="Email" name="user" class="input">
            <input type="password" placeholder="Password" name="mdp" class="input">
            <input type="submit" value="login">
            <section>
                <p>
                    Not an user yet?
                    <a href="sigin.php">sign up</a>
                </p>
            </section>
        </form>
    </div>
</body>

</html>