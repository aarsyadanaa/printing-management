const form = document.querySelector("form"),
fileInput = document.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");
const submitBtn = document.getElementById('submitBtn');
const uploadForm = document.getElementById('uploadForm');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

form.addEventListener("click", () =>{
  fileInput.click();
});
fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        submitBtn.style.display = 'block';
    } else {
        submitBtn.style.display = 'none';
    }
  });
submitBtn.addEventListener('click', function() {
    if (!submitBtn.hasAttribute('disabled')) {
      uploadForm.submit(); 
    }
  });

  fileInput.addEventListener("change", function () {
    const files = fileInput.files;
    if (files.length > 0) {
      uploadFiles(files);
    }
  });

function uploadFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const xhr = new XMLHttpRequest();
    xhr.open("POST", ""); // Gantilah dengan URL endpoint Anda
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    const formData = new FormData();
    for (let i = 0; i < files.length; i++) {
      formData.append('files[]', files[i]);
  }
    //formData.append("file", file); // Menggunakan "file" sebagai nama input

    xhr.upload.addEventListener("progress", ({ loaded, total }) => {
      const fileLoaded = Math.floor((loaded / total) * 100);
      const fileTotal = Math.floor(total / 1000);
      let fileSize;

      if (fileTotal < 1024) {
        fileSize = fileTotal + " KB";
      } else {
        fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
      }

      const progressHTML = "";
      uploadedArea.classList.add("onprogress");
      progressArea.innerHTML += progressHTML; // Gunakan += untuk menambahkan progress baru

      if (loaded == total) {
        const uploadedHTML = `<li class="row">
                                <div class="content upload">
                                  <i class="fas fa-file-alt"></i>
                                  <div class="details">
                                    <span class="name">${file.name} • Uploaded</span>
                                    <span class="size">${fileSize}</span>
                                  </div>
                                </div>
                                <i class="fas fa-check"></i>
                              </li>`;
        uploadedArea.classList.remove("onprogress");
        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
      }
    });

    let data = new FormData(form);
  xhr.send(data);
  }
}
