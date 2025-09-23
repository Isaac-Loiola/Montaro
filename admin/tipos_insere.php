<?php 
    include "acesso_com.php";
    include "../php/class/tipo.php";

    if($_POST){
        if(isset($_POST['enviar'])){
            $tipo = new Tipo();
            $tipo->sigla = $_POST['sigla'];
            $tipo->rotulo = $_POST['rotulo'];

            if($tipo->inserir()){
                header('location: tipos_lista.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilo.css">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<title>Produto - Insere</title>
</head>
<body>
<?php include "menu_adm.php";?>
<main class="container my-4">
<div class="row justify-content-center">
<div class="col-12 col-sm-8 col-md-8">
<h2 class="breadcrumb text-danger d-flex align-items-center">
<a href="produtos_lista.php" class="me-2">
<button class="btn btn-danger">
<i class="bi bi-chevron-left"></i>
</button>
</a>
                Inserindo Tipos
</h2>
 
            <div class="card shadow-sm">
<div class="card-body">
<form action="tipos_insere.php" method="post" 
                        name="form_insere" enctype= "multipart/form-data"
                        id="form_insere">

                        <div class="mb-3">
<label for="nome" class="form-label">Rotulo:</label>
<div class="input-group">
<span class="input-group-text"><i class="bi bi-egg-fried"></i></span>
<input type="text" name="rotulo" id="rotulo" 
                                    class="form-control" placeholder="Digite o Rotulo do Tipo"
                                    maxlength="100" required>
</div>
</div>

<div class="mb-3">
    <label for="sigla" class="form-label">Sigla:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-egg-fried"></i>
            </span>
            <input type="text" name="sigla" id="sigla"
                    class="form-control" placeholder="Digite a Sigla do Tipo"
                    axlength="100" required>
        </div>
</div>
 
 
                        <!-- Botão -->
<div class="d-grid">
<input type="submit" name="enviar" id="enviar" class="btn btn-danger w-100" value="Cadastrar">
</div>
 
                    </form>
</div>
</div>
 
        </div>
</div>
</main>''
</body>
</html>