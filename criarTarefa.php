<form action="Main.php" method="post">

    <div class="row">

        <div class="col-sm-6">

            <p><label for="NomeTarefa">Nome da tarefa</label></p>
            <input type="text" name="NomeTarefa" id="NomeTarefa" class="form-control" autocomplete="off">

        </div>

        <div class="col-sm-6">

            <p><label for="NomeProjetoTarefa">Nome do Projeto</label></p>
            <select name="NomeProjetoTarefa" id="NomeProjetoTarefa" class="form-control">
                <?php

                    include_once('conexao.php');
                    $sql = $conn->query('

                        select id_projeto,Nome_projeto from Projeto where ID_Usuario_Projeto = 
                        '.$_SESSION['idUsuarioLogin']
                
                    );

                    try {
                        foreach ($sql as $linha) {
                            echo "<option value='$linha[0]'>$linha[1]</option>";
                        }
                    } catch (PDOException $erro) {
                        $mensagem = $erro->getMessage();
                    }
                    
                ?>
            </select>

        </div>

    </div>

    <div class="row">

        <div class="col-sm-4"></div>
        <div class="col-sm-4">

            <p><label for="DataTarefa">Data final da tarefa</label></p>
            <input type="date" name="DataTarefa" id="DataTarefa" class="form-control">

        </div>
        <div class="col-sm-4"></div>

    </div>

    <div class="row">

        <div class="col-sm-12">

            <p><label for="DescricaoTarefa">descrição da tarefa</label></p>
            <textarea rows="3" name="DescricaoTarefa" id="DescricaoTarefa" autocomplete="off" class="form-control"></textarea>

            <input type="number" name="IDusuarioTarefa" id="IDusuarioTarefa" style="display: none;" value="<?=$_SESSION['idUsuarioLogin']?>">

        </div>

    </div>


</form>