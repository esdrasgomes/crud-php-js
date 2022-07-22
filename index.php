<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Celke - Listar duas tabelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-4 mb-2">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <h4>Listar Usuários</h4>
                <div>                    
                    <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">Cadastrar</button>
                </div>
            </div>
        </div>
        

        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <span class="listar-usuarios"></span>
            </div>
        </div>
    </div>

    <!-- Inicio Modal cadastrar -->
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadUsuarioModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErro"></span> <!-- Mensagem no modal caso dê erro ao cadastrar -->
                    <!-- Inicio Formulário -->
                    <form class="row g-3" id="cad-usuario-form">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do usuário...">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail do usuário..." >
                        </div>
                        <div class="col-12">
                            <label for="logradouro" class="form-label">Endereço:</label>
                            <input type="text" name="logradouro" class="form-control" id="logradouro" placeholder="Endereço do usuário..." >
                        </div>
                        <div class="col-12">
                            <label for="numero" class="form-label">Nº:</label>
                            <input type="text" name="numero" class="form-control" id="numero" placeholder="Número..." >
                        </div>
                            <div class="col-12">
                                <input type="submit" class="btn btn-outline-primary btn-md" id="cad-usuario-btn" value="Cadastrar">
                            </div>
                    </form>
                    <!-- Fim Formulário -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Fim Modal cadastrar-->

    <!-- Inicio Modal visualisar -->
    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span> <!-- Mensagem no modal caso dê erro ao cadastrar -->
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="idUsuario"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="nomeUsuario"></span></dd>

                        <dt class="col-sm-3">E-mail</dt>
                        <dd class="col-sm-9"><span id="emailUsuario"></span></dd>

                        <dt class="col-sm-3">Logradouro</dt>
                        <dd class="col-sm-9"><span id="logradouroUsuario"></span></dd>

                        <dt class="col-sm-3">Número</dt>
                        <dd class="col-sm-9"><span id="numeroUsuario"></span></dd>
                    </dl>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Fim Modal visualisar -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>

</html>