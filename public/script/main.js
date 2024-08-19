const fileInput = document.getElementById('file-input');
const documentPreview = document.getElementById('document-preview');
let documentCount = 0;
fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        documentCount++; // Hitung jumlah dokumen yang telah diunggah
        const documentTitle = `Dokumen ${documentCount}`; // Buat judul dokumen
        // Tambahkan sekat antara dokumen dengan judul
        const separator = document.createElement('hr');
        const titleElement = document.createElement('h3');
        titleElement.textContent = documentTitle;
        documentPreview.appendChild(separator);
        documentPreview.appendChild(titleElement);
        if (file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            const reader = new FileReader();
            reader.onload = function (e) {
                const arrayBuffer = e.target.result;
                const blob = new Blob([arrayBuffer], { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });
                convertDocxToHtml(blob);
            };
            reader.readAsArrayBuffer(file);
        } else if (file.type === 'application/pdf') {
            displayPdf(file);
        } else {
            alert('Tipe file tidak didukung.');
        }
    }
});
function convertDocxToHtml(blob) {
    mammoth.convertToHtml({ arrayBuffer: blob })
        .then(function (result) {
            const documentContent = document.createElement('div');
            documentContent.innerHTML = result.value;
            documentPreview.appendChild(documentContent);
        })
        .catch(function (error) {
            console.error(error);
            alert('Terjadi kesalahan saat mengonversi dokumen.');
        });
}
function displayPdf(file) {
    const pdfObject = document.createElement('object');
    pdfObject.data = URL.createObjectURL(file);
    pdfObject.type = 'application/pdf';
    documentPreview.appendChild(pdfObject);
}