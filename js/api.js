var boton = document.getElementById("consultaReniec");

function traer() {
  var dni = document.getElementById("nic").value;
  if (dni.length == 8) {
    fetch(
      "https://dniruc.apisperu.com/api/v1/dni/" + dni + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImRhbmllbHBlcmljaGU0NUBnbWFpbC5jb20ifQ.J1b1ZPU-JXHu2jQ7apjKVd4bbXq0qdd88fsAsPzI8c4"
    )
      .then((res) => res.json())
      .then((data) => {
        document.getElementById("name").value =
          data.nombres + " " + data.apellidoPaterno + " " + data.apellidoMaterno;
      });
  } else {
    mostrarAlerta();
  }
}

boton.addEventListener("click", traer);

function mostrarAlerta() {
  var modal = document.createElement("div");
  modal.innerHTML = `
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `;
  document.body.appendChild(modal);
  var myModal = new bootstrap.Modal(modal);
  myModal.show();
  console.log(myModal);
}

