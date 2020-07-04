<?php
    if(isset($_POST['busca_texto'])){
        if($_POST['busca_por'] == 'id'){
            $vBebidas = Bebida::get_bebidas_por_id($_POST['busca_texto']);
        }
        else{
            $vBebidas = Bebida::get_bebidas_por_nome($_POST['busca_texto']);
        }
    }
    else{
        $vBebidas = Bebida::get_bebidas();
    }
?>

<div class="row">
    <div class="col">

        <form action="" method="POST">
            <div class="form-group">
                <label>Buscar por:</label>
                <select class="form-control" name="busca_por">
                    <option value="id">ID</option>
                    <option value="nome">Nome</option>
                </select>
            </div>
            <div class="form-group">
                <label>Texto:</label>
                <input type="text" class="form-control" name="busca_texto" required placeholder="Digite o ID ou o Nome a ser buscado..." />
            </div>
            <div class="form-button">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <h1>Bebidas</h1>

        <?php
            if(!$vBebidas){
                echo "Nenhuma bebida cadastrada!";
            } else{
        ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <?php 
                foreach($vBebidas as $objBebida){
            ?>
                <div class="card" style="width: 18rem;">
                    <img src=<?= "./src/img/" . $objBebida->url_image ?> class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $objBebida->nome ?></h5>
                        <p class="card-text"> <?= $objBebida->descricao ?></p>
                    </div>
                </div>
            <?php 
                }
            ?>
        </div>

        <?php 
            }
        ?>

    </div>
</div>