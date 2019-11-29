<link rel="stylesheet" href="./css/Cad_estilo.css">
<!-- Popup de Login -->
<div class="modal fade" data-backdrop = "static"  id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Titulo do Formulario de Login -->
            <div class="modal-header">
                <h1>Login</h1>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Formulario de Login -->
            <div class="model-body">
                <form action="" method="POST" id = "Loginform">
                    <div class="form-group">
                        <label for="inputUserName">Usuário</label>
                        <input class="inputDados" placeholder="Login User" type="text" id="LoginUserName" name = "userlog"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword">Senha</label>
                        <input class="inputDados" placeholder = "Login Password" type = "password" id="inputPasswordLog" name = "passlog" />
                    </div>

                    <button  class = "btn btn-primary" id = "btn-log" onclick = "validarLogin()">Login</button>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-reg" data-target="#registerModal" data-toggle = "modal">Register</button>
            </div>

            <div class="modal-footer">
                <button class = "btn-closer btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>
<!-- Fim do Popup Login -->
