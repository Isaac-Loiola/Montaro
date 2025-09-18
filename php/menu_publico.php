<?php 
    include_once 'class/db.php';

    $pdo = getConnection();
    $tipo_lista = $pdo->query("select * from tipos");
    $tipos = $tipo_lista->fetchAll();

?>


        <nav class="navbar navbar-expand-xl fixed-top ">
           <div class="container-fluid">
               <a href="index.html" class="navbar-brand">
                   <img src="../images/logo/montaro-logo-white.png" alt>
               </a>
               <button class="navbar-toggler" 
               type="button" 
               data-bs-target="#menuPublico" 
               data-bs-toggle="collapse" 
               aria-controls="menuPublico"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
                   <span class="bi bi-three-dots"></span>
               </button>
               <div class="collapse navbar-collapse" id="menuPublico">
                   <ul class="navbar-nav ms-auto mb-2 mb-md-0 gap-2" >
                       <li class="nav-item">
                           <a href="index.html" class="nav-link active" aria-current="page">
                               <i class="bi bi-house-door-fill text-white"></i>
                           </a>
                       </li>
                       <li class="nav-item ">
                           <a href="#about-us" class="nav-link text-white">
                               Sobre nós
                           </a>
                       </li>
                       <li class="nav-item ">
                           <a href="#nossosvalores" class="nav-link text-white">
                               Valores
                           </a>
                       </li>
                       <li class="nav-item ">
                        <a href="#oquenostorna" class="nav-link text-white">
                            Única
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link text-white">
                            Destaques
                        </a>
                    </li>
                       <li class="nav-item">
                           <a href="#products" class="nav-link text-white">
                               Produtos
                           </a>
                       </li>
                       <li class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Tipos 
                           </a>
                           <ul class="dropdown-menu">
       
                           <?php foreach ($tipos as $tipo) :?>
                                    <li>
                                        <a href="produtos_por_tipo.php?tipo_id=<?= $tipo['id']?>" class="dropdown-item"><?= $tipo['rotulo']?></a>
                                    </li>
                            <?php endforeach; ?>
       
                           </ul>
                       </li>
                       <li class="nav-item">
                           <a href="#contato" class="nav-link text-white">
                               Contato
                           </a>
                       </li>
                       <li class="nav-item">
                           <form action="produto_busca.php" method="get" class="d-flex" role="search">
                               <input type="text" class="form-control me-2" placeholder="Buscar produto" aria-label="Search" name="buscar" required>
                               <button class="btn btn-outline-light">
                                   <i class="bi bi-search"></i>
                               </button>
                           </form>
                       </li>
                       <li class="nav-item"> 
                           <a href="#" class="nav-link text-white">
                               <i class="bi bi-person-fill"></i> &nbsp; admin/cliente
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
        </nav>