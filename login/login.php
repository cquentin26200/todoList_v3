<?php $title = "Login" ?>
<?php include_once "../includes/header.php" ?>

<div class="container-form">
    <form action="../verification/verif_register.php" method="POST" class="login">
        <h1>S'identifier</h1>
        <p class="text-center">Connecter vous pour rester connecté.</p>
        <div class="column">
            <input type="email" name="email" id="email" value="<?= isset($_COOKIE["email"]) ? $_COOKIE["email"] : "" ?>">
            <label for="email">email</label>
        </div>
        <div class="column showPassword">
            <input type="password" name="password" id="password">
            <label for="password">password</label>
        </div>
        <?php if (isset($_GET["verification"])) { ?>
            <p class="error">Un des champs n'est pas valide !</p>
        <?php } ?>
        <div class="checkbox">
            <input type="checkbox" id="knowPassword">
            <label for="knowPassword" class="knowPassword">Afficher le mot de passe</label>
            <div class="groupCheck">
                <span class="check"></span>
            </div>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="condition" id="condition">
            <label for="condition">Souviens-toi de moi</label>
            <div class="groupCheck">
                <span class="check"></span>
            </div>
        </div>
        <input type="submit" value="S'inscrire" class="sendForm">
        <p class="text-center haveAccount">Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
    </form>
</div>
<script src="../js/script.js"></script>
</body>

</html>