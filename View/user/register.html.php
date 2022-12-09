<div class="container-register">
    <div class="register-container">
        <form id="form-register" method="post" action="/index.php?c=user&a=register">
            <div>
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" minlength="5" maxlength="150" required>
            </div>
            <div>
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" minlength="2" maxlength="50" required >
            </div>
            <div>
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" minlength="2" maxlength="50" required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" minlength="7" maxlength="70" required>
            </div>
            <div>
                <label for="repeat-password">Répétez votre mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" class="submit" name="submit" value="S'inscrire">
        </form>
    </div>
</div>
