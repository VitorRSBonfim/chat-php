<form action="_grupos.php" method="post">

    <div class="row">

        <div class="col-sm-6">

            <p><label for="NomeGrupo">Nome do grupo</label></p>
            <input type="text" name="NomeGrupo" id="NomeGrupo" class="form-control" autocomplete="off">

        </div>

        <div class="col-sm-6">

            <p><label for="TipoGrupo">Tipo de grupo</label></p>
            <select name="TipoGrupo" id="TipoGrupo" class="form-control">

                <option value="Estudos">Estudos</option>
                <option value="Empresarial">Empresarial</option>
                <option value="Geral">Geral</option>

            </select>

        </div>

    </div>

    <div class="row">

        <div class="col-sm-12">

            <p><label for="DescricaoGrupo">descrição do grupo</label></p>
            <textarea rows="3" name="DescricaoGrupo" id="DescricaoGrupo" autocomplete="off" class="form-control"></textarea>

        </div>

    </div>

</form>