const itens = document.querySelectorAll('.item');
const pesquisa = document.querySelector("#pesquisa");
const tr = document.querySelectorAll('#tlinha');

pesquisa.addEventListener('input', () => {
    const valorCampo = pesquisa.value.toLowerCase().trim();
    itens.forEach(item => {
        const linha = item.parentElement;
        console.log(linha);
        const textoItem = item.textContent.toLocaleLowerCase();
        const itemVisivel = textoItem.includes(valorCampo);
        linha.style.display = itemVisivel ? 'table-row' : 'none';
    });
});
