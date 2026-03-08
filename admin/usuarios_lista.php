<?php 
include_once 'accesso_com.php';

include_once "../php/class/usuario.php";

    $usuario = new Usuario();
    $usuarios = $usuario->listar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos- Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'menu_adm.php'; ?>
    <main class="container my-4">
        <h1>Lista de Usuarios</h1>
        <table class="table table-striped border-ligth">
            <thead class="table-dark">
                <tr class="p-5">
                    <th class="d-none">ID</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Nível</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as  $user): ?>
                    <tr>
                        <td class="">
                            <?= $user['id'] ?>
                        </td>
                        <td class="">
                            <?= $user['nome'] ?>
                        </td>
                        <td class="">
                            <?= $user['email'] ?>
                        </td>
                        <td class="">
                            <?= $user['cpf'] ?>
                        </td>
                        <td class="">
                            <?= $user['nivel'] ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </main>
</body>
</html>