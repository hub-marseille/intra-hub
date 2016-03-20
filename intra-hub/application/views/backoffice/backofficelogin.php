<main class="container valign-wrapper row">
    <div id="loginDiv" class="col s4 offset-s4 valign">
        <form action="/login" method="POST">
            <div class="row input-field">
                <input id="login" name="login" placeholder="epitech's login" type="text">
                <label for="login">Login :</label>
            </div>
            <div class="row input-field">
                <input id="pwd" name="pwd" placeholder="Unix password" type="password">
                <label for="pwd">password :</label>
            </div>
                <div class="row">
                    <button id="loginButton" class="waves-effect waves-light btn-large col s12" type="submit">
                        Connect
                        <i class="material-icons right">send</i>
                    </button>
                    <p id="loginConfirm" class="col s12"><?php echo $Status ?></p>
                </div>
        </form>
    </div>
</main>