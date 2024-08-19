<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Smartprint File Upload</title>
  <link rel="stylesheet" href="../css/up.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <header>Upload File Anda</header><br>
    <p style="color: red; font-size: 13px;">*Utamakan format file PDF agar akurat dan tidak berantakan<br><b>*Gunakan juga mode dekstop agar lebih maksimal</p>
    <!-- <form action="/post" method="POST" enctype="multipart/form-data" id="uploadForm">
      @csrf
      <input class="file-input" type="file" name="files[]" multiple  hidden> 
      <i class="fas fa-cloud-upload-alt"></i>
      <p id="upload">Browse File to Upload</p>
    </form> -->
    <form action="/guest/post" method="POST" enctype="multipart/form-data" id="uploadForm">
    @csrf
    <input class="file-input" type="file" name="files[]" multiple hidden>
    <i class="fas fa-cloud-upload-alt"></i>
    <p id="upload" onclick="fileUpload()">Browse File to Upload</p>
</form>
    <section class="progress-area"></section>
    <section class="uploaded-area"></section><br>
    <button onclick="myFunction()" type="button" id="submitBtn" class="tombol">Selanjutnya</button>
    <div id="loading-overlay" class="overlay">
      <div class="spinner"></div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../script/up.js"></script>
  <script>
function myFunction() {
  var clicked = false;
  var x = document.getElementById("submitBtn");
  if (x.innerHTML === "Selanjutnya", !clicked) {
    clicked = true;
    x.innerHTML = "Memproses...";
  } else {
    x.innerHTML = "Selanjutnya";
  }
}
function fileUpload() {
        // Handle file upload logic here
        const fileInput = document.querySelector('.file-input');
        fileInput.value = ''; // Kosongkan nilai input file setelah unggahan
    }
</script>

</body>
</html>