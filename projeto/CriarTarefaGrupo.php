<form action="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" method="post">

    <div class="row">

        <div class="col-sm-6">

            <p><label for="NomeTarefaGP">Nome da tarefa</label></p>
            <input type="text" name="NomeTarefaGP" id="NomeTarefaGP" class="form-control" autocomplete="off">

        </div>

        <div class="col-sm-6">

            <p><label for="NomeProjetoTarefaGP">Nome do Projeto</label></p>
            <select name="NomeProjetoTarefaGP" id="NomeProjetoTarefaGP" class="form-control">
                <?php

                    include_once('conexao.php');
                    $sql = $conn->query('

                        select projeto.*,itemProjeto.ID_grupo_Itemprojeto,itemProjeto.ID_Projeto_ItemProjeto from projeto
                        inner join
                            itemProjeto
                        on projeto.ID_Projeto = itemProjeto.ID_Projeto_ItemProjeto where itemProjeto.ID_Grupo_ItemProjeto ='.$_GET['idGrupo'].'
                
                    ');

                    try {
                        foreach ($sql as $linha) {
                            echo "<option value='$linha[0]'>$linha[3]</option>";
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

            <p><label for="DataTarefaGP">Data final da tarefa</label></p>
            <input type="date" name="DataTarefaGP" id="DataTarefaGP" class="form-control">

        </div>
        <div class="col-sm-4"></div>

    </div>

    <div class="row">

        <div class="col-sm-12">

            <p><label for="DescricaoTarefaGP">descrição da tarefa</label></p>
            <textarea rows="3" name="DescricaoTarefaGP" id="DescricaoTarefaGP" autocomplete="off" class="form-control"></textarea>

        </div>

    </div>

</form>