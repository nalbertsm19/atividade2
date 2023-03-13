<html lang="pt-br">

<head>
    <title>JavaScript e Ajax</title>
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
    function mudarCorInput() {
        document.getElementById("nomeID").style.background = '#000000';
    }

    function ajax() {
        let informacoes = "";
        informacoes = "nome=" + document.getElementById('idnome');
        $.ajax({
            url: "script.php",
            type: "POST",
            data: informacoes,
            dataType: "html"

        }).done(function(resposta) {
            console.log(resposta);

        }).fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            console.log("funcionou");
        });
    }
    </script>
</head>

<body>
    <h1>JavaScript e Ajax</h1>

    <form id="formDadastroDeAluno" method="POST" action="index.php">
        Nome: <input type="text" name="nome" id="idnome"></br>
        CPF: <input type="number" name="cpf" id="cpfID"></br>
        Idade: <input type="number" name="idade" id="ididade"></br>
        Sexo: <select name="sexo">
            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
        </select></br>
        Telefone: <input type="number" name="telefone" id="telefoneID"></br>
        CEP: <input type="number" name="cep" id="cepID"></br>
        Turma: <select name="turma">
            <option value="1228">1228</option>
            <option value="1229">1229</option>
        </select></br>
        Estado Origem: <select id="idEstado" name="estadoOrigem" class="form-control">
            <option value="0" selected>Selecione seu estado</option>
            <option value="sp">São Paulo</option>
            <option value="ms">Mato Grosso do Sul</option>
        </select><br>
        Cidade Origem:<select id="cidadeID" name="cidade" class="form-control">
            <?php
            if ($_POST) {
            if ($_POST["idEstado"] == "ms") {
            echo "<option value=\"corumba\">Corumbá</option>";
            echo "<option value=\"ladario\">Ladário</option>";
            } else if ($_POST["idEstado"] == "sp") {
            echo "<option value=\"andradina\">Andradina</option>";
            echo "<option value=\"ilhaSolteira\">Ilha Solteira</option>";
            echo "<option value=\"lorena\">Lorena</option>";
            }
            } else {
            echo "<option value=\"0\">Escolha o estado</option>";
            
            }
            ?>
           </select ><br>
         <input onclick="ajax()" type="button" name="ajax" id="idajax" value="Ajax">
    </form>

</body>

</html>