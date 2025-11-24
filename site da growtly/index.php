<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Growtly</title>
    <style>
        body{
            background: #000;
        }
        
    </style>
    
</head>
<!-- Botão Fale Conosco -->
<div id="fale-conosco-container">
  <button id="fale-conosco-btn">Fale Conosco</button>
  
  <div id="fale-conosco-form">
    <form action="fale_conosco.php" method="POST">
      <div class="mb-2">
        <input type="text" name="nome" class="form-control" placeholder="Seu nome" required>
      </div>
      <div class="mb-2">
        <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
      </div>
      <div class="mb-2">
        <textarea name="mensagem" class="form-control" rows="3" placeholder="Digite sua mensagem" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
  </div>
</div>

<style>
  /* Container fixo no canto inferior esquerdo */
  #fale-conosco-container {
    position: fixed;
    bottom: 20px;
    left: 20px;
    z-index: 1000;
    font-family: Arial, sans-serif;
  }

  /* Botão principal */
  #fale-conosco-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: background 0.3s, transform 0.2s;
  }

  #fale-conosco-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
  }

  /* Formulário suspenso */
  #fale-conosco-form {
    display: none;
    margin-top: 10px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    width: 320px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: all 0.4s ease;
    transform: translateY(20px);
    opacity: 0;
  }

  /* Formulário visível */
  #fale-conosco-form.show {
    display: block;
    transform: translateY(0);
    opacity: 1;
  }

  /* Inputs e textarea */
  #fale-conosco-form .form-control {
    margin-bottom: 12px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
  }

  #fale-conosco-form .btn {
    border-radius: 8px;
  }
</style>

<script>
  const btn = document.getElementById('fale-conosco-btn');
  const form = document.getElementById('fale-conosco-form');


  btn.addEventListener('click', () => {
    form.classList.toggle('show');
  });
</script>


<body class="bg-">

    <nav>
        <div class="nav-logo">
            <a href="#">
                <img src="">
            </a>
        </div>  

        <ul class="nav-links">
            <li class="link"><a href="#">Home</a></li>
            <li id="link1" class="link"><a href="#">Serviços</a></li>
            <li id="link2" class="link"><a href="#">Preços</a></li>
            <li id="link3" class="link"><a href="#">Sobre</a></li>
            <li id="link4" class="link"><a href="https://nickolassantoscremasco.github.io/PlayOn">Repertório</a></li>

        </ul>
        <?php if (isset($_SESSION['usuario_nome'])): ?>
    <span style="color: whitesmoke; margin-right: 15px;">Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
    <a href="logout.php" class="btn" style="color: whitesmoke;">Sair</a>
<?php else: ?>
    <a href="login.php" class="btn" style="color: whitesmoke;">Login</a>
<?php endif; ?>

    </nav>

    <header class="container">
        <div class="content">
            <span class="blur"></span>
            <span class="blur"></span>
            <h4>CRIE SEU SITE COMO QUISER</h4>
            <H1>Olá, somos a <span>Growtly</span></H1>
            <p>
                Somos uma empresa focada em desenvolvimento de sites e paginas de redes sociais para pequenos negócios e
                empresas, fazendo assim eles crescerem junto com o desenvolvimento do site criado pela nossa equipe.
            </p>

        </div>
        <div class="image">
            <img src="growtly png.png">
        </div>
    </header>

   <section class="container">
    <h2 class="header">SERVIÇOS</h2>
    <div class="features">
        <div class="card">
            <span><i class="ri-rocket-line"></i></span>
            <h4>Turbinamos suas Vendas</h4>
            <p>
                Transformamos seu negócio online e aumentamos suas vendas através de soluções digitais inteligentes.
            </p>
        </div>
        <div class="card">
            <span><i class="ri-layout-line"></i></span>
            <h4>Sites Funcionais</h4>
            <p>
                Criamos sites totalmente funcionais, responsivos e otimizados para que seus clientes tenham a melhor experiência.
            </p>
        </div>
        <div class="card">
            <span><i class="ri-customer-service-2-line"></i></span>
            <h4>Suporte ao Cliente</h4>
            <p>
                Oferecemos suporte dedicado para resolver qualquer problema ou dúvida relacionada ao seu site ou projeto.
            </p>
        </div>
        <div class="card">
            <span><i class="ri-bar-chart-line"></i></span>
            <h4>Marketing e Crescimento</h4>        
            <p>
                Ajudamos a promover seu negócio, melhorar sua presença online e alcançar mais clientes de forma eficiente.
            </p>
        </div>
    </div>
</section>


    <section class="container">
    <h2 class="header">PREÇOS</h2>
    <p class="sub-header">
        Preços dos planos que oferecemos feito do zero pela nossa equipe.
    </p>
    <div class="pricing">
        <div class="card">
            <div class="content">
                <h4>Plano Básico</h4>
                <h3>500 BRL</h3>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Site pronto e funcional.
                </p>
            </div>
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <a href="pagamento.php?plano=1"><button class="btn">Compre Agora</button></a>
            <?php else: ?>
                <a href="login.php"><button class="btn">Compre Agora</button></a>
            <?php endif; ?>
        </div>

        <div class="card">
            <div class="content">
                <h4>Plano Gold</h4>
                <h3>1000 BRL</h3>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Site pronto e funcional.
                </p>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Conta no Instagram com 3 postagens iniciais.
                </p>
            </div>
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <a href="pagamento.php?plano=2"><button class="btn">Compre Agora</button></a>
            <?php else: ?>
                <a href="login.php"><button class="btn">Compre Agora</button></a>
            <?php endif; ?>
        </div>

        <div class="card">
            <div class="content">
                <h4>Plano Diamond</h4>
                <h3>1500 BRL</h3>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Site pronto e funcional.
                </p>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Conta no Instagram com 3 postagens iniciais.
                </p>
                <p>
                    <i class="ri-checkbox-circle-line"></i>
                    Conta no X com postagens mostrando seu comércio.
                </p>
            </div>
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <a href="pagamento.php?plano=3"><button class="btn">Compre Agora</button></a>
            <?php else: ?>
                <a href="login.php"><button class="btn">Compre Agora</button></a>
            <?php endif; ?>
        </div>
    </div>
</section>


    <!-- Chefs Section -->
    <section id="chefs" class="chefs section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="header">MEMBROS</h2>
            <p class="sub-header">Conheça os integrantes da nossa empresa.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">


            <div class="row g-4 team-grid mt-2">

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/andrielly.jpg" alt="Sous chef portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                                <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>

                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Andrielly</h4>
                            <p class="role mb-2">Programadores</p>
                            <p class="excerpt mb-3">Programadora Front-end e Back-end do site do cliente.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="250">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/ryan.jpg" alt="Pastry chef portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Ryan</h4>
                            <p class="role mb-2">Programadores</p>
                            <p class="excerpt mb-3">Programador Front-end e Back-end do site da empresa.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/blanchard.jpg" alt="Grill chef portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a></li>
                                <li><a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Nicholas</h4>
                            <p class="role mb-2">Analista de Processos</p>
                            <p class="excerpt mb-3">Analista de processo responsável por documentar a atividade da equipe.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/gabriel.jpg" alt="Line cook portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                                <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Gabriel</h4>
                            <p class="role mb-2">Social Midia</p>
                            <p class="excerpt mb-3">Responsavel pela divulgação da empresa.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/lucas paulo.jpg" alt="Line cook portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                                <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Lucas Paulo</h4>
                            <p class="role mb-2">Social Mídia</p>
                            <p class="excerpt mb-3">Designer responsável por realizar as postagens da nossa empresa no nosso instagram.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/pedro lucas.jpg" alt="Line cook portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                                <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Pedro Lucas</h4>
                            <p class="role mb-2">Arquitetura de Software</p>
                            <p class="excerpt mb-3">Responsavel por fazer o diagrama de classe.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                                                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                    <article class="chef-card h-100">
                        <div class="image-wrapper">
                            <img src="imagens/pedro_rocha.jpg" alt="Line cook portrait" class="img-fluid"
                                loading="lazy">
                            <ul class="social list-unstyled m-0">
                                <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                                <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="content p-3" style="color: whitesmoke">
                            <h4 class="name mb-1">Pedro Rocha</h4>
                            <p class="role mb-2">Designer</p>
                            <p class="excerpt mb-3">Responsavel por planejar, criar e otimizar o design da empresa, garantindo uma experiência visual atraente e funcional para o usuário.</p>
                            <div class="badges d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </article>
                </div><!-- End Chef Card -->

                
            </div>

        </div>

    </section><!-- /Chefs Section -->


    <footer class="container">
        <span class="blur"></span>
        <span class="blur"></span>
        <div class="column">
            <div class="logo">
                <img src="growtly png.png">
            </div>
            <p>
                Vamos crescer juntos?

            </p>
            <div class="socials">
                <a href="https://www.youtube.com/@Growtlytec"><i class="ri-youtube-line"></i></a>
                <a href="https://www.instagram.com/growtly_/"><i class="ri-instagram-line"></i></a>
                <a href="https://x.com/growtlytec"><i class="ri-twitter-line"></i></a>
            </div>
        </div>
        <div class="column">
            <div class="column">
                <h4>Contact</h4>
                <a href="#">(21) 94565-5698</a>
                <a href="#">growtlycontato@gmail.com</a>
                <a href="#">Rua Marechal Soares de Andréia, 90</a>
            </div>
    </footer>





    <script src="script.js"></script>
</body>

</html>