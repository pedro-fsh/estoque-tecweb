const linhas = document.querySelectorAll('tr');

for(let i = 0; i < linhas.length; i++) {
    linhas[i].addEventListener('click', mostrarModal);
}

function mostrarModal() {
    const campos = this.querySelectorAll('td');
    const campoCod = campos[0].innerText;
    const campoItem = campos[1].innerText;
    let campoQuantidade = campos[2].innerText;
    const campoId = campos[3].innerText;
    document.querySelector('#botaoModal').click();

    const tituloModal = document.querySelector('#tituloModalItem');
    tituloModal.innerText = campoItem;

    const corpoModal = document.querySelector('#corpoModalItem');
    corpoModal.innerHTML = 
    `<label for="idProduto" class="form-label">ID Relacionada</label>
    <input type="text" value="${campoId}" class="form-control" name="idProduto" disabled>
    <label for="codProduto" class="form-label">Código do Produto</label>
    <input type="text" value="${campoCod}" class="form-control" name="codProduto" id="codProduto" disabled>
    <label for="novaQuantidade" class="form-label">Alterar Quantidade</label>
    <input type="text" value="${campoQuantidade}" class="form-control" name="novaQuantidade" id="novaQuantidade">`;

    const botaoApagar = document.querySelector('#botaoApagarProduto');
    botaoApagar.value = `${campoCod};${campoId};${campoQuantidade}`;

    const botaoEditar = document.querySelector('#botaoEditarProduto');

    document.querySelector('#novaQuantidade').addEventListener('input', () => {
        campoQuantidade = document.querySelector('#novaQuantidade').value;
    });

    botaoEditar.addEventListener('click', () => {
        botaoEditar.value = `${campoId};${campoCod};${campoQuantidade}`;
    });

}



