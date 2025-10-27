<?php 
    $dados = [
        'nome' => 'Exemplo',
        'idade' => 30,
        'cidade' => 'São Paulo'
    ];
    $json = json_encode($dados);

    echo $json; 
?>