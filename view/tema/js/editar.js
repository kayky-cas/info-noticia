

function edit(id) {

    nome = document.querySelector('#nome'+id).innerHTML;
    document.querySelector('#nome'+id).innerHTML = '<input name="editNome'+id+'" type="text" value="'+nome+'" id="editNome'+id+'">'
    email = document.querySelector('#email'+id).innerHTML;
    document.querySelector('#email'+id).innerHTML = '<input name="editEmail'+id+'" type="text" value="'+email+'" id="editEmail'+id+'">'
    document.querySelector('#funcao'+id).innerHTML = '<label> <select class="form-control" name="editFuncao'+id+'" id="editFuncao'+id+'"> <option value="0">Aluno</option> <option value="1">Professor</option> <option value="2">Administrador</option> </select> </label>'
    const botaoVerm = document.querySelector('#botaoVerm'+id);
    const botaoAzul = document.querySelector('#botaoAzul'+id);
    botaoVerm.innerHTML = '<i class="material-icons">clear</i>';
    botaoVerm.href = '';

    botaoAzul.innerHTML = '<i class="material-icons">done</i>';
    botaoAzul.onclick = function () {
        window.location.href = urlPagina+'usuario/editar/'+id+'!'+document.querySelector('#editNome'+id).value+'!'+document.querySelector('#editEmail'+id).value+'!'+document.querySelector('#editFuncao'+id).value;
    };
}
function editNoticia(id) {
    const divTitulo = document.querySelector('#divTitulo'+id);
    const divDescricao = document.querySelector('#divDescricao'+id);
    const divBotoes = document.querySelector('#divNoticiaB'+id);
    const botaoAzul = document.querySelector('#botaoAzulNoticia'+id);

    oldTitulo = document.querySelector('#titulo'+id).innerHTML;
    oldDesc = divDescricao.innerHTML;

    divTitulo.innerHTML = '<input class="inputTitulo bg-info" name="editTitulo" type="text" value="'+oldTitulo+'" id="editTitulo">'
    divDescricao.innerHTML = '<textarea class="inputDesc" rows="10" cols="100" id="editDesc">'+oldDesc+'</textarea>';


    divBotoes.innerHTML = '<button class="btn btn-primary" id="salvarEditNoticia">Salvar</button><a href="" class="btn btn-danger">Cancelar</a>';
    document.querySelector('#salvarEditNoticia').onclick = function (){
        window.location.href = urlPagina+'noticia/alterar/'+id+'¿'+document.querySelector('#editTitulo').value+'¿'+document.querySelector('#editDesc').value;
    };
    // ¿¿¿¿
}