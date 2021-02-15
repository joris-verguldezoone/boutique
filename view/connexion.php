<main>
        <form class="block" method="POST" action="connexion.php">
            <h1><u>Connexion</u></h1>

            <article>
                <label for="login" name="login" class="inp">
                    <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;">
                    <span class="label">Login</span>
                    <span class="focus-bg"></span>
                </label>
                <label for="password" name="password" class="inp">
                    <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;">
                    <span class="label">Password</span>
                    <span class="focus-bg"></span>
                </label>
            </article>

            <input type="submit" id="ConnexionSubmit" value="register" name="register">
        </form>
        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Connexion(); // prend pas le bon
    $newUser->connect($_POST['login'], $_POST['password']);
}