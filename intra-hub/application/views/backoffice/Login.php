<main id="intratop" class="container valign-wrapper row">
    <div id="loginDiv" class="col s4 offset-s4 valign">
        <form action="authenticate" method="post" id="loginForm">
            <div class="row input-field">
                <input id="login" name="login" placeholder="epitech's login" type="text">
                <label for="login">Login :</label>
            </div>
            <div class="row input-field">
                <input id="pwd" name="pwd" placeholder="Unix password" type="password">
                <label for="pwd">password :</label>
            </div>
        </form>
        <div class="row">
            <button id="loginButton" class="waves-effect waves-light btn-large col s12">
                Connect
                <i class="material-icons right">send</i>
            </button>
            <p id="loginConfirm" class="col s12"><?php echo $Status ?></p>
        </div>
    </div>
</main>

<script type="text/javascript">
    $("#loginButton").on("click", function(event){

        var login = $("#login").val();
        var pwd =  $("#pwd").val();
        var formSubmit = $.ajax({
            type: "POST",
            url: "backoffice/home/authenticate",
            data: {login: login, pwd: pwd}
        });
        formSubmit.done(function(data){
            if (data != false)
                $("#lolwut").html(data);
        })
    });
</script>