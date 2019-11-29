<link rel="stylesheet" href="./css/Cad_estilo.css">
<div class="modal fade" data-backdrop = "static" id="registerModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <!-- Titulo do Formulario de Register -->
                            <div class="modal-header">
                                <h1>Bem vindo à BR.Bets</h1>
                                <!-- <h4 class="modal-title">Login</h4> -->
                                <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Formulario de Login/Registro -->
                            <div class="model-body">
                                <form action="" method="POST" id = "form_register">
                                    <div class="form-group">
                                        <label for="inputUserName">Usuário</label>
                                        <input class="inputDados" placeholder="User name" type="text" id="RegisterUserName" name = "nameuser"  />
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail">E-mail</label>
                                        <input class="inputDados" placeholder = "User Email" type = "email" id="RegisterEmail" name = "emailuser" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputPassword">Senha</label>
                                        <input class="inputDados" placeholder = "User Password" type = "password" id="RegisterPassword" name = "passuser" />
                                    </div>

                                    <input type="button" class = "btn btn-primary" id = "btn-reg" onclick = "verificarCampos()" value = "Criar Conta"/>
                                </form>
                            </div>

                            <div class="modal-footer">
                                
                                <button class = "btn-closer btn-primary" data-dismiss="modal">Close</button>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Fim popup Register -->
<!-- <script src="Register.js"></script> -->
<script src="../validacoesjs/Register.js"></script>