<main>



    <h2 class="mt-3">Excluir vaga</h2>
    <form action="" method="post">

        <div class="form-group">
            <p> Você realmente deseja excluir a vaga <strong> <?= $obVaga->titulo ?></strong> ? </p>

        </div>

        <div class="form-group mt-3">


            <a href="index.php">
                <button type="button" class=' btn btn-success'>Cancelar</button>
            </a>

            <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
        </div>

    </form>
</main>