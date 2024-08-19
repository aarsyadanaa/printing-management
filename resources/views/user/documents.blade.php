<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../css/preview.css">
    <script type="text/javascript" src="../path/to/pdf.js/build/pdf.js"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            text-align: center;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <title>Preview Dokumen</title>
</head>
<body>
    <div class="header">
        <h1>Preview Dokumen</h1>
    </div>
    <form action="/user/totalPage" method="post"> 
        @csrf 
        @foreach ($fileData as $data)
        <div class="container">
        <h3>File {{ $loop->iteration }} : {{ preg_replace('/^(.*?)_/', '', pathinfo($data['fileName'], PATHINFO_FILENAME)) }}</h3>
        <?php $name = $data['fileName']; ?>

            <iframe src="{{ $data['filePath'] }}" frameborder="0" id="pdfFrame"></iframe>
            <p>Total Halaman: {{ $data['totalPages'] }}</p>
            <input type="hidden" name="totalPages[]" value="{{ $data['totalPages'] }}">
            <input type="hidden" name="fileNames[]" value="{{ $data['fileName'] }}">
            <button class="open-modal-button" type="button" data-total-pages="{{ $data['totalPages'] }}" data-name="{{ $data['fileName'] }}">Print Setting</button>
        </div>
        @endforeach
        <div class="next-button-container">
            <button type="submit" class="next-button">Selanjutnya</button>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal" id="printSettingsModal">
    <div class="modal-content">
        <span class="close" id="closePrintModalBtn">&times;</span>
        <form id="printSettingsForm" action="/user/printOption" method="post">
            @csrf
            <label for="pageCount">Page:</label>
            <input type="text" id="pageCount" name="setPage" min="1">
            <br><br>
            <label for="copyCount">Copy:</label>
            <input type="number" id="copyCount" name="copyCount" min="1">
            <br><br>
            <label for="colorMode">Mode:</label>
            <select name="colorMode" id="colorMode">
                <option value="color">Color</option>
                <option value="bw">Grey</option>
            </select>
            <br><br>
            <br>
            <label for="nameValue"></label>
            <p id="nameValue" hidden></p>
            <br>
            <input type="hidden" name="fileName" id="fileNameInput" value="">
            <input type="hidden" name="totalPages" id="fileTotalPages" value="">
            <input type="submit" value="Cetak">
        </form>
    </div>
    </div>

    <script>
const openModalButtons = document.querySelectorAll('.open-modal-button');
const printSettingsModal = document.getElementById('printSettingsModal');
const closePrintModalBtn = document.getElementById('closePrintModalBtn');
const printSettingsForm = document.getElementById('printSettingsForm');
const nameValue = document.getElementById('nameValue');
const colorMode = document.getElementById('colorMode');
const pageSize = document.getElementById('pageSize');
const totalPagesValue = document.getElementById('totalPagesValue');

openModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const totalPages = button.getAttribute('data-total-pages');
        const name = button.getAttribute('data-name');
        fileTotalPages.value = totalPages;
        nameValue.textContent = `${name}`;     
        fileNameInput.value = name;       
        printSettingsModal.style.display = 'block'; // perbaikan disini
    });
});

closePrintModalBtn.addEventListener('click', () => {
    printSettingsModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === printSettingsModal) {
        printSettingsModal.style.display = 'none';
    }
});
    </script>
</body>
</html>
