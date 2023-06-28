<!-- formulario.html -->
<html>
<head>
    <title>Formulário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
</head>
<body>
<?php
    $totalForms = 10; // Total de formulários desejados

    for ($i = 1; $i <= $totalForms; $i++) {
        echo "<form action=\"tratamento.php\" method=\"post\" id='form".$i."'
                <label for=\"nome\">Nome:</label>
                <input type=\"text\" name=\"nome\" id=\"nome\" required>
                <br>
                <label for=\"email\">Email:</label>
                <input type=\"email\" name=\"email\" id=\"email\" required>
                <br>
                <input type=\"submit\" value=\"Enviar\">
            </form>";
    }
    ?>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content centraliza">
            <div id="modalContent"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Verifica se a URL possui um parâmetro "response"
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('response')) {
            // Obtém o valor do parâmetro "response"
            var response = urlParams.get('response');
            // Atualiza o conteúdo do elemento com ID "modalContent"
            document.getElementById('modalContent').textContent = response;
            // Exibe o modal
            $('#myModal').addClass('fadeIn').show();

            // Fecha o modal após 2 segundos
            setTimeout(function () {
                $('#myModal').removeClass('fadeIn').addClass('fadeOut');
                setTimeout(function () {
                    $('#myModal').hide().removeClass('fadeOut');
                }, 500);
            }, 2000);
        }

        // Fecha o modal ao clicar fora dele
        $('#myModal').click(function (event) {
            if ($(event.target).is('#myModal')) {
                $(this).removeClass('fadeIn').addClass('fadeOut');
                setTimeout(function () {
                    $('#myModal').hide().removeClass('fadeOut');
                }, 500);
            }
        });
    </script>
</body>
</html>
