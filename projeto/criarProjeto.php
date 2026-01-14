
    <form action="Main.php" method="post">

        <div class="row">

            <div class="col-sm-6">

                <p><label for="NomeProjeto">Nome do projeto</label></p>
                <input type="text" name="NomeProjeto" id="NomeProjeto" class="form-control" autocomplete="off" required>

            </div>

            <div class="col-sm-6">

                <p><label for="DataProjeto">Data final do projeto</label></p>
                <input type="date" name="DataProjeto" id="DataProjeto" class="form-control" autocomplete="off" required>

            </div>

        </div>

        <div class="row pt-1">

            <div class="col-sm-12">

                <p><label for="DescricaoProjeto">descrição do projeto</label></p>
                <textarea rows="3" name="DescricaoProjeto" id="DescricaoProjeto" autocomplete="off" class="form-control" required></textarea>

            </div>

            <input type="number" name="IDusuario" id="IDusuario" style="display: none;" value="<?=$_SESSION['idUsuarioLogin']?>">

        </div>
    
    </form>




