function validarLogin(){
    
    let username = document.querySelector('input[name = userlog');

    let user_password = document.querySelector('input[name = passlog');

    if (username.value == "") {
        return alert("Nome Vazio");
    }
    if (user_password.value == ""){
        return alert("Senha vazia ou Inválida")
    }

    var dados = $('#Loginform').serialize();


    console.log("ajax entrou");
    
        $.ajax({
            url: './sessoes/log_user.php', 
            type: 'POST',
            data: dados,
        }).done(function() {
            console.log("Sucesso!");
            userlogado.value = din;
            document.querySelector('button[name = botaologar]').style.display = "none";
            document.querySelector('button[name = usuariologado').style.display = "flex";
        });

    $('#loginModal').trigger("reset");

}
