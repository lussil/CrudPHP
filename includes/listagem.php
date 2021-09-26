<?php

$resultados = '' ;
foreach($vagas as $vaga){
    $resultados .= '<tr>
    <td>'.$vaga->id.'</td>
    <td>'.$vaga->titulo.'</td>
    <td>'.$vaga->descricao.'</td>
    <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
    <td>'.date('d/m/Y à\s H:i:s',strtotime($vaga->data)).'</td>
    <td>
     
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
        <table class="table bg-light mt-3 ">
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
                <?=$resultados?>
            </tbody>

        </table>
    </section>
</main>