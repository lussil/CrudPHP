<?php

$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '<tr>
    <td>' . $vaga->id . '</td>
    <td>' . $vaga->titulo . '</td>
    <td>' . $vaga->descricao . '</td>
    <td>' . ($vaga->ativo == 1 ? 'Ativo' : 'Inativo') . '</td>
    <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="editar.php?id=' . $vaga->id . '"> <button type="button" class="btn btn-warning">Editar</button> </a>
        <a href="ver.php?id=' . $vaga->id . '"> <button type="button" class="btn btn-primary">ver</button>     </a>
        <a href="excluir.php?id=' . $vaga->id . '"> <button type="button" class="btn btn-danger">Excluir</button>    </a>
        </div>
    </td>
  </tr>';
}

?>
<main>
    <section>
        <a href="cadastrar.php">
            <button class=' btn btn-success'> Nova vagas</button>
        </a>
    </section>
    <section>
        <table class="table table-dark bg-light mt-3 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>descrição</th>
                    <th>status</th>
                    <th>data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>