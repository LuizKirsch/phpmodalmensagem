<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?php
$i = 1;
while ($i <= 10) {
  $formId = "form" . $i;
  ?>

  <!-- Formulário -->
  <form id="<?php echo $formId; ?>">
    <!-- Campos do formulário -->
    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="E-mail">
    <!-- Outros campos... -->

    <!-- Botão de envio -->
    <button type="submit" data-form-id="<?php echo $formId; ?>">Enviar</button>
  </form>

  <?php
  $i++;
}
?>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="modalContent"></div>
  </div>
</div>

<style>
    /* Estilos do modal
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fff;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 300px;
  max-width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} */

</style>

<script>
   document.addEventListener("DOMContentLoaded", function() {
  
  var forms = document.querySelectorAll("form");

  
  forms.forEach(function(form) {
    form.addEventListener("submit", function(event) {
      event.preventDefault();

      var formId = form.getAttribute("id");

      var formData = new FormData(form);

      var xhr = new XMLHttpRequest();

      <?php $arquivoBack = "back.php" ?>

      xhr.open("POST", "<?php echo $arquivoBack?>", true);

      xhr.onload = function() {
        if (xhr.status === 200) {

          var response = xhr.responseText;

          document.getElementById("modalContent").innerHTML = response;
          document.getElementById("myModal").style.display = "block";
        } else {
            
          console.error("Erro na requisição. Status: " + xhr.status);
        }
      };

      xhr.send(formData);
    });
  });

  document.getElementsByClassName("close")[0].addEventListener("click", function() {
    document.getElementById("myModal").style.display = "none";
  });
});
</script>