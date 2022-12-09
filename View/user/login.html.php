<div id="container-login">
    <div id="login-container">
        <form action="/?c=user&a=login" method="post">
            <div>
                <label for="email">Adresse mail</label>
                <input type="email" name="email" id="email" minlength="5" maxlength="150" required>
            </div>
            <div>
                <label for="password">Mot de passe: </label>
                <input type="password" name="password" id="password" minlength="7" maxlength="70" required>
            </div>

            <input type="submit" name="submit" class="submit" value="Se connecter">
        </form>
    </div>
</div>