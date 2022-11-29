<!-- 
      * Página MinhasPublicacoes *

          Funções:
            - pagina que mostra as publicacoes que o usuario ja criou
            - tem a opcao de exluir e editar as publicacoes
-->
<?php
session_start();
if (empty($_SESSION["login"])) {
  header('location: LoginCadastro.php');
  session_destroy();
}

include('../Controllers/PerfilController.php');

$controller = new PerfilController();

$action = !empty($_GET['a']) ? $_GET['a'] : 'getAllPerfil';
// $actionNom = !empty($_GET['a']) ? $_GET['a'] : 'getNom';

$controller->{$action}();
// $controller->{$actionNom}();

$resultData = $_SESSION['perfil'];
// $result=$_SESSION['Nom'];
$str = implode(" ",$_SESSION['Nom']);
$name= strstr($str, ' ', true);
// echo $name;exit;


?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="stylesheet" href="./style/stylepubli.css">
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>3
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<style>
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 400px;
		margin: 30px auto;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="./img/logopb.png">
      <span class="logo_name">SciLink</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Home.php" class="active">
          <i class='bx bx-message-square-dots'></i>
          <span class="links_name">Publicações</span>
        </a>
      </li>
      <li>
        <a href="FomularioPubli.php">
          <i class='bx bx-edit-alt'></i>
          <span class="links_name">Criar Publicação</span>
        </a>
      </li>
      <li>
        <a href="MinhasPublicacoes.php">
          <i class='bx bx-library'></i>
          <span class="links_name">Minhas Publicações</span>
        </a>
      </li>
      <li>
        <a href="PaginaPerfil.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Meu Perfil</span>
        </a>
      </li>
      <li class="log_out">
        <a href="LoginCadastro.php">
          <i class='bx bx-door-open'></i>
          <span class="links_name">Sair</span>
        </a>
      </li>
    </ul>

  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Perguntas</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Filtrar">
        <i class='bx bx-search' style="background-color: #546CB3; color: rgb(255, 255, 255);"></i>
      </div>


      <div class="profile-details">
        <img src="./img/iconCientista.png" alt="">

        <div class="dropdown">
          <span><?=$name?></span>
          <div class="dropdown-content">
            <div class="teste">
              <a href="CadastroPerfil.php" class="son">Editar Perfil</a><br>
              <a href="LoginCadastro.php" class="son">Sair</a>
            </div>
          </div>
        </div>

        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="espaco-table">

    </div>


    <?php foreach ($resultData as $data) : ?>
      <table border="0" class="tableMinhasPublicacoes">
        <tr>
          <td class="titulo">
            <h3><?= $data['tit_projeto'] ?></h3>
          </td>
        </tr>
        <tr>
          <td class="info">
            <p>Início do Projeto: <?= $data['dti_projeto'] ?></p>
            <p>Início do Projeto: <?= $data['dtt_projeto'] ?></p>
          </td>
        </tr>
        <tr>
          <td class="resumo">
            <p><?= $data['res_projeto'] ?></p>
          </td>
        </tr>
        <tr>
          <td class="pessoa">

            <div class="info-pessoa">
              <p> <?= $data['nom_cientista'] ?> • <?= $data['nom_area_atuacao'] ?> </p>
              <div class="redes">
                <div class="linkedin">
                  <img src="./img/bxl-linkedin.svg" alt="Linkedin logo">
                  <p> https://br.linkedin.com/ </p>
                  <p>Status do projeto: <?php if($data['pub_projeto'] == 1){ echo 'publico';}else{ echo 'privado';} ?> </p>
                </div>
                <div class="email">
                  <img src="./img/bx-envelope.svg" alt="email logo">
                  <p> <?= $data['email_cientista'] ?> </p>
                </div>
              </div>
            </div>
            <div class="botoesMinhasPubli">
              <a href="#" class="botaoEdit">Editar</a>
              <a href="#" class="botaoDel" data-toggle="modal" data-target="#myModal">Excluir</a>
              </div>
              
           

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title" id="limiter">Você tem certeza excluir <span class="spanh4"> <?= $data['tit_projeto']?></span></h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Caso você clique em "Excluir", o processo não poderá ser desfeito.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
				<a href="../Controllers/EditPubliController.php?id=<?=$data['id_projeto'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
			</div>
		</div>
	</div>
</div>     

          </td>
        </tr>
      </table>

    <?php endforeach; ?>

    <div class="espaco-table">

    </div>

  </section>





  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
 
</body>

</html>