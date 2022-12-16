<?php $title = "Register" ?>
<?php include_once "../includes/header.php" ?>

<div class="container-form">
    <form action="../verification/verif_register.php" method="POST" class="register">
        <h1>S'inscrire</h1>
        <p class="text-center">Créez votre compte.</p>
        <div>
            <div class="column">
                <input type="text" name="firstName" id="firstName">
                <label for="firstName">prénom</label>
            </div>
            <?php if (isset($_GET["firstNameError"])) { ?>
                <p class="error">Veuillez remplir correctement cette case</p>
            <?php } ?>
            <div class="column">
                <input type="text" name="lastName" id="lastName">
                <label for="lastName">nom</label>
            </div>
            <?php if (isset($_GET["lastNameError"])) { ?>
                <p class="error">Veuillez remplir correctement cette case</p>
            <?php } ?>
        </div>
        <div class="column">
            <input type="email" name="email" id="email">
            <label for="email">email</label>
        </div>
        <?php if (isset($_GET["emailError"])) { ?>
            <p class="error">Veuillez remplir correctement cette case</p>
        <?php } else if (isset($_GET["email_used"])) { ?>
            <p class="error">Cette email est déjà utilisé</p>
        <?php } ?>
        <div>
            <div class="column">
                <input type="password" name="password" id="password">
                <label for="password">password</label>
            </div>
            <?php if (isset($_GET["passwordError"])) { ?>
                <p class="error">Veuillez remplir correctement cette case</p>
            <?php } ?>
            <div class="column">
                <input type="password" name="passwordConfirmed" id="passwordConfirmed">
                <label for="passwordConfirmed">Confirmer le mot de passe</label>
            </div>
            <?php if (isset($_GET["confirmedPassword"])) { ?>
                <p class="error">Veuillez entrer le même mot de de passe</p>
            <?php } else if (isset($_GET["confirmedPasswordError"])) { ?>
                <p class="error">Veuillez remplir correctement cette case</p>
            <?php } ?>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="condition" id="condition">
            <label for="condition">J'accepte les conditions d'utilisation</label>
            <div class="groupCheck">
                <span class="check"></span>
            </div>
        </div>
        <?php if (isset($_GET["checkedError"])) { ?>
            <p class="error">Veuillez accepter les conditions d'utilisation</p>
        <?php } ?>
        <input type="submit" value="S'inscrire" class="sendForm">
        <p class="text-center haveAccount">Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
    </form>
</div>
<script src="../js/script.js"></script>
</body>

</html>