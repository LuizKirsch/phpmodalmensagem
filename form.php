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
  <div class="modal-content centraliza">
    <!-- <span class="close">&times;</span> -->
    <div id="modalContent"></div>
  </div>
</div>

<style>
  .centraliza {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }

  .modal-content {
    display: flex;
    background-color: #eceff1;
    padding-bottom: 20px;
    margin-top: 50px;
    margin-bottom: 90px;
    border-radius: 10px;
    background: #ffffff;
    width: 80%;
    padding: 0.6em 1.3em;
    font-size: 18px;
    border: 3px solid black;
    border-radius: 0.4em;
    box-shadow: 0.1em 0.1em;
    flex-wrap: wrap;
    align-content: center;
  }

  .modal-content {
    /* Resto das suas propriedades CSS existentes */
    animation: aparecerModal 0.5s forwards;
  }

  @keyframes aparecerModal {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-50%);
    }
  }

  @keyframes desaparecerModal {
    0% {
      transform: translateX(0%);
    }
    100% {
      transform: translateX(100%);
    }
  }

  .fadeOut {
    animation: desaparecerModal 0.5s forwards;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var forms = document.querySelectorAll("form");
    var modal = document.getElementById("myModal");

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

            modal.style.display = "block";

            setTimeout(function() {
              modal.classList.add("fadeOut");
              setTimeout(function() {
                modal.style.display = "none";
                modal.classList.remove("fadeOut");
              }, 500);
            }, 2000);
          } else {
            console.error("Erro na requisição. Status: " + xhr.status);
          }
        };

        xhr.send(formData);
      });
    });
  });
</script>
