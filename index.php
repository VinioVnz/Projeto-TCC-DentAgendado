<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&family=Inter:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* index.css */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative; /* Garantir que o body envolva os elementos corretamente */
        }

        /* Ajuste para a imagem de fundo */
        .background-blur {
            background-image: url('./imgs/backgroundimg.png');
            background-size: cover;  /* A imagem cobre 100% da largura e altura */
            background-position: center center;  /* A imagem é centralizada */
            background-repeat: no-repeat;  /* A imagem não repete */
            position: fixed;  /* A imagem fica fixa enquanto o conteúdo rola */
            width: 100%;
            height: 100%;  /* A imagem ocupa 100% da altura da tela */
            z-index: -2;  /* A imagem fica atrás de todo o conteúdo */
        }

        /* Filtro verde sobre a imagem de fundo */
        .green-filter {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;  /* O filtro cobre toda a altura da tela */
            background-color: rgba(35, 213, 210, 0.3);
            z-index: -2;  /* Filtro fica acima da imagem mas abaixo do conteúdo */
        }

        nav {
            background-color: rgba(35, 213, 210, 0.8);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10; /* Colocando o nav acima da section */
            
        }

        nav ul {
            display: flex;
            justify-content: flex-end;
            margin-right: 50px;
            align-items: center;
            list-style: none;
            padding: 15px;
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
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transição suave */
        }
        .btnEntrar:hover{
            background-color: #1A7C7C;
            transform: scale(1.05); /* Efeito de aumento no tamanho do botão */
        }

        /* A section agora aparece por cima da imagem */
        section {
            position: relative; /* Tornando a section posicionada em relação ao fundo */
            z-index: 2; /* A section estará acima da imagem de fundo e do filtro verde */
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            padding-top: 150px; /* Ajuste o espaçamento superior conforme necessário */
            
        }

        .about {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 100px;
            margin-top: 80px;
        }

        .about-text {
            color: white;
            font-weight: 400;
            font-size: 20px;
        }

        .btnAbout {
            margin-top: 20px;
            background-color: #fff;
            padding: 10px 20px;
            border: none;
            color: black;
            font-size: 20px;
            cursor: pointer;
            border-radius: 30px;
            width: 300px;
            height: 60px;
            transition: all 0.3s ease /* Transição suave */
        }
        .btnAbout:hover{
            transform: scale(1.05); /* Efeito de aumento no tamanho do botão */
            background-color: rgba(35, 213, 210, 0.8);
            color:white;
        }

        .img-logo {
            display: flex;
            justify-content: end;
            align-items: center;
            margin-right: 250px;
            margin-top: 150px;
            width: 300px;
        }

        .imgsla {
    margin-top: -60px;
    width: 300px;
    transition: all 0.3s ease-in-out; /* Transição suave */
}

/* Efeito de hover para troca de imagem */
.imgsla:hover {
    content: url('./imgs/logo-piscando.png');  /* Troca a imagem ao passar o mouse */
    transform: scale(1.1); /* Aumenta a imagem */
    filter: drop-shadow(0 0 20px rgba(35, 213, 210, 0.8)); /* Brilho com sombra */
}

        footer {
            text-align: center;
            padding: 10px;
            background-color: rgba(35, 213, 210);
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%; /* Garantir que o footer ocupe toda a largura */
            color: white;
            border-radius: 25px;
            height: 100px;
            z-index: 20; /* Footer acima de tudo */
            transition: transform 0.3s ease;
        }

        .footer-hidden {
            transform: translateY(100%);
        }
        .sobreNos {
    height: 100vh;
    text-align: start;
    color: white;
    font-size: 18px;
    width: 200%;
    background-color: #0a498c;
    padding: 100px;
    margin: 0;
    margin-left: -10px;
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.sobreNos.hidden {
    opacity: 0; /* Torna a seção invisível */
    transform: translateY(-100%); /* Move a seção para cima, fora da tela */
    pointer-events: none; /* Impede que a seção interaja com o usuário */
}   

        .sobreNos h2 {
            font-size: 28px;
            margin-bottom: 20px;
            margin-right: 1000px;
        }

        .sobreNos p, .sobreNos ul {
    opacity: 0; /* Começa invisível */
    transform: translateY(20px); /* Começa com um pequeno deslocamento para baixo */
    transition: opacity 0.6s ease-out, transform 0.6s ease-out; /* Transição suave */
}
.sobreNos p.visible, .sobreNos ul.visible {
    opacity: 1; /* Quando se tornam visíveis, tornam-se opacos */
    transform: translateY(0); /* O deslocamento desaparece */
}

        .sobreNos ul {
            text-align: left;
            margin: 20px auto;
            width: 80%;
        }

        .sobreNos li {
            margin-bottom: 10px;
        }

        .img-nav {
            width: 15%;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 20px;
            margin-left: -10px;
            background-color: #0a498c;
            color: white;
            
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="background-blur"></div>  <!-- A imagem de fundo se estende para toda a altura -->
    <div class="green-filter"></div> <!-- Filtro verde por cima da imagem -->

    <nav>
        <ul>
            <li class="logo"><a href='#'><img class='img-nav' src="./imgs/logo.png" alt="Logo DentAgendado"></a></li>
            <li><a href="#" style="text-decoration:none;color: #fff;">Início</a></li>
            <li><a href="fazconsulta.php" style="text-decoration:none;color: #fff;">Marcar Consulta</a></li>
            <button class='btnEntrar'>Entrar</button>
        </ul>
    </nav>

    <section>
        <div class="about">
            <p class="about-text">Agende agora a sua consulta!<br>
                Profissionais qualificados e <br>
                serviço prático
            </p>
            <button class="btnAbout" onclick="scrollToSobreNos()">Sobre Nós</button>
        </div>
        <div class="image-container">
        <div class='img-logo'>
            <img class='imgsla' src="./imgs/logo.png" alt="Logo DentAgendado">
        </div>
        </div>
    </section>

    <section id="sobreNos" class="sobrenos-section">
        <div class="sobreNos">
            <h2>Sobre Nós</h2>
            <p>Bem-vindo ao DentAgendado, seu portal confiável para a marcação de consultas odontológicas.</p>
            <ul>
                <li><strong>Pesquise</strong> por dentistas e clínicas com base na sua localização.</li>
                <li><strong>Compare</strong> horários disponíveis e escolha o que melhor se adapta à sua agenda.</li>
                <li><strong>Acesse avaliações</strong> de outros pacientes para fazer escolhas informadas.</li>
            </ul>
            <p>Se você procura um atendimento de qualidade, DentAgendado é a escolha certa. Estamos aqui para ajudá-lo a cuidar do seu sorriso!</p>
        </div>
    </section>

    <section class="gallery">
        <div class="gallery-item"><img src="./imgs/img1.jpg" alt="Imagem 1"></div>
        <div class="gallery-item"><img src="./imgs/img2.jpg" alt="Imagem 2"></div>
        <div class="gallery-item"><img src="./imgs/img3.jpg" alt="Imagem 3"></div>
        <div class="gallery-item"><img src="./imgs/img4.jpg" alt="Imagem 4"></div>
        <div class="gallery-item"><img src="./imgs/img5.jpg" alt="Imagem 5"></div>
        <div class="gallery-item"><img src="./imgs/img6.jpg" alt="Imagem 6"></div>
    </section>

    <footer id="footer">
        <p>2024©Todos os direitos reservados</p>
    </footer>

    <script>
        function scrollToSobreNos() {
            const sobreNosSection = document.getElementById('sobreNos');
            sobreNosSection.scrollIntoView({ behavior: 'smooth' });
        }

        const footer = document.getElementById('footer');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                footer.classList.add('footer-hidden');
            } else {
                footer.classList.remove('footer-hidden');
            }
        });
    </script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const elementos = document.querySelectorAll('.sobreNos p, .sobreNos ul'); // Seleciona todos os parágrafos e listas

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible'); // Adiciona a classe 'visible' quando o elemento aparece na tela
                observer.unobserve(entry.target); // Para de observar o elemento depois que ele aparecer
            }
        });
    }, {
        threshold: 0.5 // O elemento será considerado visível quando 50% dele aparecer na tela
    });

    // Inicia a observação de cada elemento
    elementos.forEach(elemento => {
        observer.observe(elemento);
    });
});
</script>
</html>
