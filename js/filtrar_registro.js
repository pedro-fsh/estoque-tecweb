const tipos = document.querySelectorAll('.tipo');
const pesquisa = document.querySelector("#pesquisa");
const tr = document.querySelectorAll('#tlinha');

const cods = document.querySelectorAll('.cod');

pesquisa.addEventListener('input', () => {
    const valorCampo = pesquisa.value.toLowerCase().trim();
    tipos.forEach(tipo => {
        const linha = tipo.parentElement;
        const textoTipo = tipo.textContent.toLocaleLowerCase();
        const itemVisivel = textoTipo.includes(valorCampo);
        linha.style.display = itemVisivel ? 'table-row' : 'none';
    });
});