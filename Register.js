function verificarCampos(){

    var username = document.getElementById("RegisterUserName");

    var user_email = document.getElementById("RegisterEmail");

    var user_password = document.getElementById("RegisterPassword");


    if (username.value == "") {
        return alert("Nome Vazio");
    }
    if (user_email.value == "" || user_email.value.indexOf('@') == -1 ) {
        return alert("Email vazio ou Inválido");
    }
    if (user_password.value == "" ) {
        return alert("Senha vazia ou Inválida")
    }

    var dados = $('#form_register').serialize();
        $.ajax({
            url: './backend/cadastro_user.php', //Destino
            type: 'POST',
            data: dados,
        }).done(function() {
            console.log("Sucesso!");
            // console.log(dados);
            alert("Usuário Cadastrado!");
            console.log(user_password.value,'\n',user_email.value,'\n',username.value);
            // console.log(username);
        });

    $('#form_register').trigger("reset");
    // $('#form_register').modal({ show: false});
}