<form action="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" method="post">

    <div class="row">

        <div class="col-sm-6">

            <p><label for="NomeProjetoGP">Nome do projeto</label></p>
            <input type="text" name="NomeProjetoGP" id="NomeProjetoGP" class="form-control" autocomplete="off" required>

        </div>

        <div class="col-sm-6">

            <p><label for="DataProjetoGp">Data final do projeto</label></p>
            <input type="date" name="DataProjetoGp" id="DataProjetoGp" class="form-control" required>

        </div>

    </div>

    <div class="row pt-1">

        <div class="col-sm-12">

            <p><label for="DescricaoProjetoGP">descrição do projeto</label></p>
            <textarea rows="3" name="DescricaoProjetoGP" id="DescricaoProjetoGP" autocomplete="off" class="form-control" required></textarea>

        </div>

    </div>

</form>