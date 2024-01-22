function uploadFile() {
    const fileInput = document.getElementById('file-input');
    const resultDiv = document.getElementById('result');

    const file = fileInput.files[0];

    if (file) {
        const formData = new FormData();
        formData.append('file', file);

        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            resultDiv.innerHTML = `<p>${data.message}</p>`;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        resultDiv.innerHTML = '<p>Por favor, selecione um arquivo.</p>';
    }
}

function updateFileName() {
    const fileInput = document.getElementById('file-input');
    const fileNameSpan = document.getElementById('file-name');

    if (fileInput.files.length > 0) {
        fileNameSpan.textContent = fileInput.files[0].name;
    } else {
        fileNameSpan.textContent = 'Nenhum arquivo selecionado';
    }
}