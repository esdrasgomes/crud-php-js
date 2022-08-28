const listarUsuarios = async(pagina) => {
    const dados = await fetch("./listar.php?pagina=" + pagina);
    const resposta = await dados.json();
    //console.log(resposta);

    if (!resposta['status']) {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        const conteudo = document.querySelector(".listar-usuarios");
        if (conteudo) {
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

listarUsuarios(1);

const cadUsuarioForm = document.getElementById("cad-usuario-form");

// Receber o seletor da janela modal
const cadUsuarioModel = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

// Só acessa o IF quando existir o seletor "cad-usuario-form"
if (cadUsuarioForm) {
    cadUsuarioForm.addEventListener("submit", async(e) => {
        // Não permitir a atualização da página
        e.preventDefault();

        const dadosForm = new FormData(cadUsuarioForm);

        // Mudando nome no botão depois do click
        document.getElementById("cad-usuario-btn").value = "Salvando...";

        //console.log("Acesso!!!");

        const dados = await fetch("cadastrar.php", {
            method: "POST",
            body: dadosForm
        });
        const resposta = await dados.json();
        //console.log(resposta);

        // Acessa o IF quando não cadastrar com sucesso
        if (!resposta['status']) {
            document.getElementById("msgAlertaErro").innerHTML = resposta['msg'];
            document.getElementById("msgAlerta").innerHTML = "";
        } else {
            document.getElementById("msgAlertaErro").innerHTML = "";
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            cadUsuarioForm.reset(); // Limpando o formulário após cadastrar
            cadUsuarioModel.hide(); // Fechando o formulário após cadastrar
            listarUsuarios(1); // Atualizando os dados após cadastrar
        }
        // Mudando nome do botão para o original
        document.getElementById("cad-usuario-btn").value = "Cadastrar";
    })
}

// Visualisar os dados do registro em um modal
async function visUsuario(id) {
    //console.log(id);
    // await = Aguarda o processamento e só vai para a próxima linha quando a consulta atual for finalizada
    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (!resposta['status']) {
        document.getElementById('msgAlerta').innerHTML = resposta['msg'];
    } else {
        document.getElementById('msgAlerta').innerHTML = "";
        const visModal = new bootstrap.Modal(document.getElementById('visUsuarioModal'));
        visModal.show();

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id;
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome;
        document.getElementById("emailUsuario").innerHTML = resposta['dados'].email;
        document.getElementById("logradouroUsuario").innerHTML = resposta['dados'].logradouro;
        document.getElementById("numeroUsuario").innerHTML = resposta['dados'].numero;
    }
}

// Recuperar os dados dos registros
async function editUsuarioDados(id) {
    document.getElementById("msgAlertaErroEdit").innerHTML = "";
    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (!resposta['status']) {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].id;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editemail").value = resposta['dados'].email;
        document.getElementById("editlogradouro").value = resposta['dados'].logradouro;
        document.getElementById("editnumero").value = resposta['dados'].numero;
    }
}

// Editar os dados do registro em um modal
const editForm = document.getElementById("edit-usuario-form");
if (editForm) {
    editForm.addEventListener("submit", async(e) => {
        e.preventDefault();

        const dadosForm = new FormData(editForm);

        // Mudando nome no botão depois do click
        document.getElementById("edit-usuario-btn").value = "Salvando...";

        const dados = await fetch("editar.php", {
            method: "POST",
            body: dadosForm
        });
        const resposta = await dados.json();
        console.log(resposta);

        if (!resposta['status']) {
            document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
            listarUsuarios(1);
        }

        document.getElementById("edit-usuario-btn").value = "Salvar";

    });
}

// Apagar o registro no bd

async function apagarUsuarioDados(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar == true) {
        const dados = await fetch('apagar_cascata.php?id=' + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (!resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            listarUsuarios(1);
        }
    }

}