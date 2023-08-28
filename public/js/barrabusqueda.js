window.addEventListener('DOMContentLoaded', () => {
    const search = document.querySelector('#search');
    const tableContainer = document.querySelector('#results tbody');
    const resultsContainer = document.querySelector('#resultsContainer');
    const erroresContainer = document.querySelector('#erroresContainer');
    let search_criteria = '';

    if (search) {
        search.addEventListener('input', event => {
            search_criteria = event.target.value.toUpperCase();
            showResults();
        });
    }

    const searchData = async () => {
        let searchData = new FormData();
        searchData.append('search_criteria', search_criteria);
        try {
            const response = await fetch('views/prueba/barrabusqueda.php', {
                method: 'POST',
                body: searchData
            });
            return response.json();
        } catch (error) {
            console.error(error);
        }
    };

    const showResults = () => {
        searchData().then(dataResults => {
            console.log(dataResults);
            tableContainer.innerHTML = '';
            if (typeof dataResults.data !== 'undefined' && !dataResults.data) {
                erroresContainer.style.display = 'block';
                erroresContainer.querySelector('p').innerHTML = `No hay productos con este nombre: <span class="bold">${search_criteria}</span>`;
                resultsContainer.style.display = 'none';
            } else {
                resultsContainer.style.display = 'block';
                erroresContainer.style.display = 'none';
            }
        });
    };
});
