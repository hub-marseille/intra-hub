<main id="intratop" class="container valign-wrapper row">
    <div id="loginDiv" class="col s4 offset-s4 valign">
		<br /><br />
        <form id="loginForm">
            <div class="row input-field">
                <input id="login" name="login" placeholder="epitech's login" type="text">
                <label for="login">Login :</label>
            </div>
            <div class="row input-field">
                <input id="pwd" name="pwd" placeholder="Unix password" type="password">
                <label for="pwd">password :</label>
            </div>
        </form>
		<p id="loginConfirm" class="col s12"><br /></p><br />
         <button id="loginButton" class="waves-effect waves-light btn-large col s12" onclick="signin();">
             Connect
             <i class="material-icons right">send</i>
        </button>
        <div class="row">
        </div>
    </div>
</main>

<script type="text/javascript">
    function signin()
	{
        var login = $("#login").val();
        var pwd =  $("#pwd").val();
        var formSubmit = $.ajax({
            type: "POST",
            url: base_url+"backoffice/home/authenticate",
            data: {login: login, pwd: pwd}
        });
        formSubmit.done(function(data){
            if (data == 'ok') {
                $("#loginConfirm").html('Connexion réussie');
				window.location.href = base_url+"backoffice";
			}
			else if (data == 'ko') {
				$("#loginConfirm").html('Oops nop.');
			}
        })
    }

	$(document).keyup(function(e) {
		if (e.keyCode == 13)
			signin();
	});


</script>