<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>

<body>
    <div class="container">
        <form class="form" action="../inc/t_sigin.php" method="POST">
            <div class="title">Welcome,<br><span>sign up to continue</span></div>
            <input type="text" name="nom" id="">
            <input type="email" placeholder="Email" name="email" class="input">
            <input type="password" placeholder="Password" name="password" class="input">
            <select name="genre" id="">
                <option value="F">Femme</option>
                <option value="M">Homme</option>
            </select>
            <input type="date" name="birthday" id="">
            <input type="submit" value="Sign up" class="btn">
    </div>
    </div>
    </form>
    </div>
</body>

</html>