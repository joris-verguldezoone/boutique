<main>
    <form class="block" method="POST" action="profil.php">
        <h1><u>Profil</u></h1>

        <article>
            <label for="login" name="login" class="inp">
                <input type="text" id="profilLogin" name="login" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['login'];?>">
                <span class="label">New Login</span>
                <span class="focus-bg"></span>
            </label>
            <label for="password" name="password" class="inp">
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;">
                <span class="label">New Password</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <input type="password" id="profilConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm New Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <input type="text" id="inscriptionEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">New Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="update" name="register">
            <?php

    if (isset($_POST['register'])) {
        
        $newUser = new \Controller\Profil(); 
        $newUser->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
    }
    ?>
        </form>
</main>