    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Consultas</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&family=Inter:wght@100;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            
            body {
                font-family: "Inter", sans-serif;
    margin: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(35, 213, 210, 1));
    color: #333;
    display: flex; /* Torna o body um contêiner flex */
    justify-content: center; /* Centraliza verticalmente */
    align-items: center; /* Centraliza horizontalmente */
    min-height: 100vh; /* Garante que ocupe a altura total da tela */
    flex-direction: column;
        
    }
            .img-nav {
                width: 15%; /* Reduzi o tamanho da imagem para diminuir o nav */
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
        list-style:none;
        margin-right: 50px;
        align-items: center; /* Alinha os itens no centro verticalmente */
        height: 100%; /* Para garantir que os itens fiquem centralizados */
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
                font-family: "Inter", sans-serif;
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
        margin: 0; /* Remova a margem do botão */
    }
    .btnEntrar:hover{
        background-color:#1c7c7a;
        
    }
    /* Contêiner do Formulário */
    .form-container {
            max-width: 980px;
            min-height: 400px;
            background: #147D7B;
            padding: 25px;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            margin-top: 150px;
        }

    select#procedimento , select#profissional {
        height: auto;
    }
    .fa-user:before {
        content: "\f007";
        color: black;
    }.fa-briefcase-medical:before {
        content: "\f469";
        color: black;
    }
    .fa-user:before {
        content: "\f007";
        color: black;
    }.fa-user-doctor:before, .fa-user-md:before {
        color: black;
        content: "\f0f0";
    }
    .fa-calendar-alt:before, .fa-calendar-days:before {
        content: "\f073";
        color: black;
    }
    h1 {
        color: white;
        text-align: center;
        margin-bottom: 20px;
        font-size: 28px;
    }
    label {
            color: white;
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .input-icon {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon input,
        .input-icon select {
            padding-left: 30px;
            width: calc(100% - 30px);
            height: 40px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-icon select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .input-icon select:focus {
            border-color: #007BFF;
            outline: none;
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

            /* Estilização Global */

    /* Título */





    /* Estilos dos Inputs e Selects */
    /* Estilos dos Inputs e Selects */
        input, select {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #25E3E0;
            outline: none;
            background-color: #e3f2fd;
        }

        button {
            margin-left: 340px;
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

        button:hover {
            color: #25E3E0;
            background-color: #fff;
            transform: scale(1.02);
        }

        .mensagem {
            color: #4a90e2;
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
        }

        .button-view {
            background-color: #25E3E0;
            padding: 15px;
            border: none;
            border-radius: 25px;
            color: white;
            font-weight: bold;
            text-align: center;
            display: block;
            width: 100%;
            max-width: 300px;
            transition: background-color 0.3s ease;
        }

        .button-view:hover {
            color: #25E3E0;
            background-color: #fff;
        }
    .input-icon {
        
        position: relative;
        margin-bottom: 20px;
    }

    .input-icon input {
        padding-left: 30px; /* Deixe espaço para o ícone */
        color:#147D7B;
    }

    .input-icon i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color:black;
    }
    .input-icon i.fa-arrow-down {
        
        margin-left: 914px;
        color:black;
        pointer-events: none; /* Impede que a seta bloqueie a interação com o select */
    }
    .input-icon select {
        padding-left: 30px;
        padding-right: 40px; /* Dá um espaço para o ícone da seta */
        width: calc(100% - 30px);
        height: 40px;
        font-size: 16px;
        box-sizing: border-box;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
        color:#147D7B;
    }
        </style>

    </head>
    <body>
        <nav>
            <ul>
                <li class="logo"><a href='index.php'><img class='img-nav'src="./imgs/logo.png" alt="Logo DentAgendado"></a></li>
                <li><a href="index.php" style="text-decoration:none;color: #fff;">Início</a></li>
                <li><a href="fazconsulta.php" style="text-decoration:none;color: #fff;">Marcar Consulta</a></li>
                <button class='btnEntrar'>Entrar</button>
            </ul>
        </nav>
        <div class="form-container">
        <h1>Preencha o Formulário</h1>
        <form method="POST" action="lista_consultas.php">
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="input-icon">
                <i class="fas fa-briefcase-medical"></i>
                <label for="procedimento">Procedimento:</label>
                <select id="procedimento" name="procedimento" onchange="atualizarProfissionaisPorProcedimento()" required>
                    <option value="">Selecione um procedimento</option>
                    <option value="Limpeza dentária (profilaxia)">Limpeza dentária (profilaxia)</option>
                    <option value="Aplicação de flúor">Aplicação de flúor</option>
                    <option value="Restauração dentária (obturação)">Restauração dentária (obturação)</option>
                    <option value="Tratamento de canal (endodontia)">Tratamento de canal (endodontia)</option>
                    <option value="Implantes dentários">Implantes dentários</option>
                    <option value="Extração dentária">Extração dentária</option>
                </select>
                <i class="fas fa-arrow-down"></i>
            </div>

            <div class="input-icon">
                <i class="fas fa-user-md"></i>
                <label for="profissional">Profissional:</label>
                <select id="profissional" name="profissional" onclick="verificarProcedimentoAntesProfissional()" required disabled>
                    <option value="">Selecione um profissional</option>
                </select>
                <i class="fas fa-arrow-down"></i>
            </div>

            <div class="input-icon">
                <i class="fas fa-calendar-alt"></i>
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
            </div>

            <div class="input-icon">
                <i class="fas fa-clock"></i>
                <label for="horario">Hora:</label>
                
                <select id="horario" name="horario" required>
    <option value="">Selecione um horário</option>
    <option value="08:00">08:00</option>
    <option value="09:00">09:00</option>
    <option value="10:00">10:00</option>
    <option value="11:00">11:00</option>
    <option value="12:00">12:00</option>
    <option value="13:00">13:00</option>
    <option value="14:00">14:00</option>
    <option value="15:00">15:00</option>
    <option value="16:00">16:00</option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
    <option value="19:00">19:00</option>
    <option value="20:00">20:00</option>
    <option value="21:00">21:00</option>
    <option value="22:00">22:00</option>
</select>
            </div>

            <button type="submit">Cadastrar Consulta</button>
        </form>
        <form action="lista_consultas.php" method="GET" style="margin-top: 20px;">
            <button type="submit" class="button-view">Ver Consultas</button>
        </form>
    </div>
</body>
<footer id="footer">
    <p>2024©Todos os direitos reservados</p>
</footer>

<script>
    const procedimentoProfissional = {
        "Limpeza dentária (profilaxia)": ["Dr. Silva", "Dr. Almeida"],
        "Aplicação de flúor": ["Dr. Silva"],
        "Restauração dentária (obturação)": ["Dr. Almeida", "Dra. Fernanda", "Dr. Carlos"],
        "Tratamento de canal (endodontia)": ["Dra. Fernanda", "Dr. João"],
        "Implantes dentários": ["Dr. João"],
        "Extração dentária": ["Dr. Carlos"]
    };

    function atualizarProfissionaisPorProcedimento() {
        const procedimentoSelecionado = document.getElementById("procedimento").value;
        const selectProfissional = document.getElementById("profissional");

        selectProfissional.innerHTML = "<option value=''>Selecione um profissional</option>";

        if (procedimentoSelecionado) {
            const profissionais = procedimentoProfissional[procedimentoSelecionado] || [];
            
            if (profissionais.length > 0) {
                profissionais.forEach(function(profissional) {
                    const option = document.createElement("option");
                    option.value = profissional;
                    option.text = profissional;
                    selectProfissional.appendChild(option);
                });
                selectProfissional.disabled = false;
            } else {
                selectProfissional.disabled = true;
                alert("Nenhum profissional disponível para este procedimento.");
            }
        } else {
            selectProfissional.disabled = true;
        }
    }

    function verificarProcedimentoAntesProfissional() {
        const procedimentoSelecionado = document.getElementById("procedimento").value;
        if (!procedimentoSelecionado) {
            alert("Por favor, selecione o procedimento antes de escolher o profissional.");
            document.getElementById("procedimento").focus();
        }
    }

    const footer = document.getElementById('footer');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            footer.classList.add('footer-hidden');
        } else {
            footer.classList.remove('footer-hidden');
        }
    });
    document.getElementById("horario").addEventListener("input", function () {
    const horarioInput = this;
    const horario = horarioInput.value;
    const [hour, minute] = horario.split(":").map(Number);

    // Verifica se está dentro do intervalo permitido
    if (hour < 8 || hour > 22 || minute !== 0) {
        horarioInput.setCustomValidity("Escolha um horário válido (entre 08:00 e 22:00, de hora em hora).");
    } else {
        horarioInput.setCustomValidity(""); // Validação limpa se o horário é válido
    }
});
  // Definir o valor mínimo da data como amanhã
  document.addEventListener('DOMContentLoaded', function() {
            var dataInput = document.getElementById('data');
            var hoje = new Date();
            hoje.setDate(hoje.getDate() + 1); // Definir a data de amanhã
            var dataAmanha = hoje.toISOString().split('T')[0]; // Formatar no formato 'YYYY-MM-DD'
            dataInput.setAttribute('min', dataAmanha);
        });
</script>
</html>