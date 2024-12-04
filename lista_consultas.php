<?php
include "./conexaomysql.php"; // Inclui o arquivo de conexão com o banco de dados

// Variáveis para armazenar os dados da consulta a serem editados
$nome = "";
$procedimento = "";
$profissional = "";
$data = "";
$horario = "";  // Adicionando variável para armazenar o horário
$id_edicao = null;

// Verifica se o formulário foi submetido para cadastrar ou editar uma consulta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificando se os campos existem no $_POST
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $procedimento = isset($_POST['procedimento']) ? $_POST['procedimento'] : '';
    $profissional = isset($_POST['profissional']) ? $_POST['profissional'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $horario = isset($_POST['horario']) ? $_POST['horario'] : '22:22:22';  // Verificando se o horário está presente e atribuindo valor padrão

    // Se o campo 'id' estiver preenchido, significa que é uma edição
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id_edicao = $_POST['id'];
        try {
            $stmt = $conn->prepare("UPDATE consultas SET nome_completo = :nome, procedimento = :procedimento, profissional = :profissional, data = :data, horario = :horario WHERE id = :id");
            $stmt->bindParam(':id', $id_edicao);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':procedimento', $procedimento);
            $stmt->bindParam(':profissional', $profissional);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':horario', $horario);  // Atualiza o horário
            $stmt->execute();
            header("Location: lista_consultas.php?mensagem=Consulta atualizada com sucesso!");
            exit();
        } catch (PDOException $e) {
            $mensagem = "Erro ao atualizar consulta: " . $e->getMessage();
        }
    } else {
        // Caso contrário, é uma nova inserção
        try {
            $stmt = $conn->prepare("INSERT INTO consultas (nome_completo, procedimento, profissional, data, horario) VALUES (:nome, :procedimento, :profissional, :data, :horario)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':procedimento', $procedimento);
            $stmt->bindParam(':profissional', $profissional);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':horario', $horario); // Inserindo horário
            $stmt->execute();
            header("Location: lista_consultas.php?mensagem=Consulta cadastrada com sucesso!");
            exit();
        } catch (PDOException $e) {
            $mensagem = "Erro ao cadastrar consulta: " . $e->getMessage();
        }
    }
}

// Verifica se há uma ação de edição
if (isset($_GET['id'])) {
    $id_edicao = $_GET['id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM consultas WHERE id = :id");
        $stmt->bindParam(':id', $id_edicao);
        $stmt->execute();
        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se encontrar a consulta, preenche as variáveis com os dados
        if ($consulta) {
            $nome = $consulta['nome_completo'];
            $procedimento = $consulta['procedimento'];
            $profissional = $consulta['profissional'];
            $data = $consulta['data'];
            $horario = $consulta['horario']; // Preenche o horário
        }
    } catch (PDOException $e) {
        $mensagem = "Erro ao buscar consulta: " . $e->getMessage();
    }
}

// Verifica se há uma ação de exclusão
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $conn->prepare("DELETE FROM consultas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: lista_consultas.php?mensagem=Consulta excluída com sucesso!");
        exit();
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir consulta: " . $e->getMessage();
    }
}

// Verifica se há uma mensagem na URL
if (isset($_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
}

// Buscando todas as consultas cadastradas
try {
    $stmt = $conn->prepare("SELECT * FROM consultas");
    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $mensagem = "Erro ao buscar consultas: " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&family=Inter:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consultas</title>
    <style>
        .container-voltar {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 20px; /* Opcional: para adicionar um espaçamento acima do botão */
}
        .form-container {
    margin: 20px auto;
    max-width: 800px;
    background-color: #22CFCC;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    display: block;
}

.form-container form {
    display: flex;
    flex-direction: column;
}

.form-container form label {
    color: white;
    font-weight: 500;
    margin-bottom: 5px;
}

.form-container form input,
.form-container form select {
    padding: 10px;
    margin: 5px 0 15px;
    border-radius: 15px;
    border: 1px solid #ccc;
    font-size: 16px;
    color:#147D7B;
}

.form-container form button {
    font-size: 18px;
    padding: 15px;
    background-color: #25E3E0;
    color: white;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-weight: bold;
    text-align: center;
    width: 100%;
    max-width: 300px;
    margin-top: 15px;
    align-self: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.form-container form button:hover {
    color: #25E3E0;
    background-color: #fff;
    transform: scale(1.02);
}

    *{
        font-family: "Inter", sans-serif;
    }
    label{
        color:white;
    }
    .voltar {
        font-size: 18px;
        padding: 15px;
        background-color: #25E3E0;
        color: white;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        text-align: center;
        width: 100%;
        max-width: 300px;
        display: block;
        transition: background-color 0.3s ease, transform 0.2s ease;
        
    }

    .voltar:hover {
        color: #25E3E0;
        background-color: #fff;
        transform: scale(1.02);
    }

    .container {
        max-width: 70%;
        background-color: #147D7B; /* Cor de fundo fixa */
        margin: 0 auto;
        margin-top: 150px;
        padding: 25px;
        border-radius: 25px;
        overflow-y: auto;
        max-height: 80vh;
    }

    body {
        font-family: "Inter", sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(35, 213, 210, 1)); /* Gradiente para o body */
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        overflow-y: auto;
    }

    nav {
        background-color: rgba(35, 213, 210, 0.8);
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
    }

    nav ul {
        display: flex;
        justify-content: flex-end;
        list-style: none;
        margin-right: 50px;
        align-items: center;
        height: 100%;
    }

    .img-nav {
        width: 15%;
    }

    nav ul .logo {
        margin-right: auto;
        font-size: 25px;
        color: white;
    }

    nav ul li {
        margin: 0 100px;
        color: white;
        font-size: 25px;
    }

    .btnEntrar {
        background-color: #25E3E0;
        padding: 10px 20px;
        border: none;
        color: white;
        font-size: 25px;
        cursor: pointer;
        border-radius: 30px;
        width: 197px;
        margin: 0;
    }

    .btnEntrar:hover {
        background-color: #1c7c7a;
    }

    h1 {
        color: #fff;
        text-align: center;
        font-size: 50px;
    }

    .table-container {
        margin: 20px auto;
        max-width: 800px;
        background-color: #147D7B;
        padding: 20px;
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ccc;
        word-wrap: break-word;
        min-width: 100px;
        max-width: 300px;
    }

    tr {
        margin-bottom: 5px;
    }

    th {
        background-color: #22CFCC;
        color: white;
    }

    .btn-edit, .btn-delete {
        display: inline-block;
        background-color: #22CFCC;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        margin: 2px;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    table tbody tr td {
        white-space: normal;
        background-color: white;
    }

    .mensagem {
        text-align: center;
        color: #fff;
        font-size: 25px;
    }

    .form-container {
        margin: 20px auto;
        max-width: 800px;
        background-color: #22CFCC;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .form-container form {
        display: flex;
        flex-direction: column;
    }

    .form-container form input, .form-container form button {
        padding: 10px;
        margin: 5px 0;
        border-radius:15px;
    }

    .form-container form button {
       
        font-size: 18px;
    padding: 15px; /* Tamanho de botão ajustado */
    background-color: #25E3E0;
    color: white;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-weight: bold;
    text-align: center;
    width: 100%; /* O botão ocupará toda a largura disponível */
    max-width: 300px; /* Máximo de largura para telas grandes */
   
    display: block;
    transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .form-container form button:hover {
        color:#25E3E0;
    background-color: #fff;
    transform: scale(1.02); /* Aumenta ligeiramente ao passar o mouse */
    }

    footer {
        text-align: center;
        padding: 10px;
        background-color: rgba(35, 213, 210);
        position: fixed;
        bottom: 0;
        left: 0;
        width: 80%;
        margin-left: 150px;
        color: white;
        border-radius: 25px;
        height: 100px;
        transition: transform 0.3s ease;
    }

    .footer-hidden {
        transform: translateY(100%);
    }
</style>   <script>
    function mostrarFormulario() {
        document.getElementById("form-container").style.display = "block";
    }
    </script>
</head>
<body>
<nav>
    <ul>
        <li class="logo"><a href='index.php'><img class='img-nav' src="./imgs/logo.png" alt="Logo DentAgendado"></a></li>
        <li><a href="index.php" style="text-decoration:none;color: #fff;">Início</a></li>
        <li><a href="fazconsulta.php" style="text-decoration:none;color: #fff;">Marcar Consulta</a></li>
        <button class='btnEntrar'>Entrar</button>
    </ul>
</nav>

<div class="container">
    <h1>Consultas</h1>

    <?php if (isset($mensagem)): ?>
        <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Procedimento</th>
                    <th>Profissional</th>
                    <th>Data</th>
                    <th>Horário</th> <!-- Adicionando coluna de horário -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($consultas) > 0): ?>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?php echo $consulta['nome_completo']; ?></td>
                            <td><?php echo $consulta['procedimento']; ?></td>
                            <td><?php echo $consulta['profissional']; ?></td>
                            <td><?php echo $consulta['data']; ?></td>
                            <td><?php echo $consulta['horario']; ?></td> <!-- Exibindo horário -->
                            <td>
                            <a class="btn-edit" href="javascript:void(0);" onclick="mostrarFormulario(); 
        document.getElementById('nome').value = '<?php echo $consulta['nome_completo']; ?>'; 
        document.getElementById('procedimento').value = '<?php echo $consulta['procedimento']; ?>'; 
        document.getElementById('profissional').value = '<?php echo $consulta['profissional']; ?>'; 
        document.getElementById('data').value = '<?php echo $consulta['data']; ?>'; 
        document.getElementById('horario').value = '<?php echo $consulta['horario']; ?>'; 
        document.getElementsByName('id')[0].value = '<?php echo $consulta['id']; ?>'; 
        scrollParaTabela();">Editar</a>
                             <a class="btn-delete" href="lista_consultas.php?action=delete&id=<?php echo $consulta['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhuma consulta cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div id="form-container" class="form-container">
    <form action="lista_consultas.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($id_edicao) ? $id_edicao : ''; ?>">
        
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

        <label for="procedimento">Procedimento</label>
<select id="procedimento" name="procedimento" required>
    <option value="">Selecione um procedimento</option>
    <option value="Limpeza dentária (profilaxia)" <?php echo ($procedimento === 'Limpeza dentária (profilaxia)') ? 'selected' : ''; ?>>Limpeza dentária (profilaxia)</option>
    <option value="Aplicação de flúor" <?php echo ($procedimento === 'Aplicação de flúor') ? 'selected' : ''; ?>>Aplicação de flúor</option>
    <option value="Restauração dentária (obturação)" <?php echo ($procedimento === 'Restauração dentária (obturação)') ? 'selected' : ''; ?>>Restauração dentária (obturação)</option>
    <option value="Tratamento de canal (endodontia)" <?php echo ($procedimento === 'Tratamento de canal (endodontia)') ? 'selected' : ''; ?>>Tratamento de canal (endodontia)</option>
    <option value="Implantes dentários" <?php echo ($procedimento === 'Implantes dentários') ? 'selected' : ''; ?>>Implantes dentários</option>
    <option value="Extração dentária" <?php echo ($procedimento === 'Extração dentária') ? 'selected' : ''; ?>>Extração dentária</option>
</select>

<label for="profissional">Profissional</label>
<select id="profissional" name="profissional" required>
    <option value="">Selecione um profissional</option>
    <option value="Dr. João" <?php echo ($profissional === 'Dr. João') ? 'selected' : ''; ?>>Dr. João</option>
    <option value="Dra. Maria" <?php echo ($profissional === 'Dra. Maria') ? 'selected' : ''; ?>>Dra. Maria</option>
    <option value="Dr. Carlos" <?php echo ($profissional === 'Dr. Carlos') ? 'selected' : ''; ?>>Dr. Carlos</option>
    <option value="Dra. Ana" <?php echo ($profissional === 'Dra. Ana') ? 'selected' : ''; ?>>Dra. Ana</option>
    <option value="Dr. Silva" <?php echo ($profissional === 'Dra. Ana') ? 'selected' : ''; ?>>Dr. Silva</option>
    <option value="Dr. Almeida" <?php echo ($profissional === 'Dra. Ana') ? 'selected' : ''; ?>>Dr. Almeida</option>
    <option value="Dra. Fernanda" <?php echo ($profissional === 'Dra. Maria') ? 'selected' : ''; ?>>Dra. Fernanda</option>


</select>


        <label for="data">Data</label>
        <input type="date" id="data" name="data" value="<?php echo $data; ?>" required>
        
        <label for="horario">Horário</label> 
        <select id="horario" name="horario" required>
    <option value="">Selecione um horário</option>
    <option value="08:00" <?php echo ($horario === '08:00') ? 'selected' : ''; ?>>08:00</option>
    <option value="09:00" <?php echo ($horario === '09:00') ? 'selected' : ''; ?>>09:00</option>
    <option value="10:00" <?php echo ($horario === '10:00') ? 'selected' : ''; ?>>10:00</option>
    <option value="11:00" <?php echo ($horario === '11:00') ? 'selected' : ''; ?>>11:00</option>
    <option value="12:00" <?php echo ($horario === '12:00') ? 'selected' : ''; ?>>12:00</option>
    <option value="13:00" <?php echo ($horario === '13:00') ? 'selected' : ''; ?>>13:00</option>
    <option value="14:00" <?php echo ($horario === '14:00') ? 'selected' : ''; ?>>14:00</option>
    <option value="15:00" <?php echo ($horario === '15:00') ? 'selected' : ''; ?>>15:00</option>
    <option value="16:00" <?php echo ($horario === '16:00') ? 'selected' : ''; ?>>16:00</option>
    <option value="17:00" <?php echo ($horario === '17:00') ? 'selected' : ''; ?>>17:00</option>
    <option value="18:00" <?php echo ($horario === '18:00') ? 'selected' : ''; ?>>18:00</option>
    <option value="19:00" <?php echo ($horario === '19:00') ? 'selected' : ''; ?>>19:00</option>
    <option value="20:00" <?php echo ($horario === '20:00') ? 'selected' : ''; ?>>20:00</option>
    <option value="21:00" <?php echo ($horario === '21:00') ? 'selected' : ''; ?>>21:00</option>
    <option value="22:00" <?php echo ($horario === '22:00') ? 'selected' : ''; ?>>22:00</option>
</select>


        <button type="submit"><?php echo isset($id_edicao) ? 'Cadastrar Consulta' : 'Atualizar Consulta'; ?></button>
    </form>
</div>

<div class='container-voltar'>
    <button class="voltar" onclick="window.location.href='index.php'">Voltar para o Início</button>
    </div>
</div>

<footer id="footer">
    <p>2024© Todos os direitos reservados</p>
</footer>

<script>
    const footer = document.getElementById('footer');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 1) {
            footer.classList.add('footer-hidden');
        } else {
            footer.classList.remove('footer-hidden');
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
            var dataInput = document.getElementById('data');
            var hoje = new Date();
            hoje.setDate(hoje.getDate() + 1); // Definir a data de amanhã
            var dataAmanha = hoje.toISOString().split('T')[0]; // Formatar no formato 'YYYY-MM-DD'
            dataInput.setAttribute('min', dataAmanha);
        });
        document.getElementById('nome').value = '<?php echo $consulta['nome_completo']; ?>';
document.getElementById('procedimento').value = '<?php echo $consulta['procedimento']; ?>';
document.getElementById('profissional').value = '<?php echo $consulta['profissional']; ?>';
document.getElementById('data').value = '<?php echo $consulta['data']; ?>';
document.getElementById('horario').value = '<?php echo $consulta['horario']; ?>';
document.getElementsByName('id')[0].value = '<?php echo $consulta['id']; ?>';

function scrollParaTabela() {
    var tabela = document.querySelector('.form-container');
    tabela.scrollIntoView({ behavior: 'smooth' });
}

</script>

</body>
</html>