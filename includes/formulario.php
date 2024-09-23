<main>

    <section>
        <a href="index.php">
            <button class=' btn btn-success'>Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE ?></h2>
    <form action="" method="post">

        <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo ?>">
        </div>

        <div class="form-group">
            <label for=""> Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"> <?=$obVaga->descricao ?> </textarea>
        </div>

        <div class="form-group mt-3">
            <label for="">Status</label>

            <div>

                <div class="form-check form-check-inline">
                    <label class="form-control" for="">
                        <input type="radio" name="ativo" value="s" checked>Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control" for="">
                        <input type="radio" name="ativo" value="n"
                            <?=$obVaga->ativo === 1 ? 'checked' : ''  ?>>Inativo
                    </label>
                </div>

            </div>


        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>