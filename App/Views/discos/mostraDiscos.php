<div class="col-md-5">

    <table class="table table-striped table-bordered" id="tabela">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Tamanho Total</th>
            <th>Espaço livre</th>
        </tr>
        </thead>
        <tbody>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            foreach ($this->view->listaDiscos as $lista) { ?>

                <tr>
                    <td><?php echo $lista['nome'] ?></td>

                    <td>
                        <div class="">
                            <div class="" role="tab" id="heading<?php echo $lista['id_disco'] ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $lista['id_disco'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $lista['id_disco'] ?>">
                                        <?php echo $lista['total'] ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $lista['id_disco'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $lista['id_disco'] ?>">
                                <div class="panel-body">
                                    <?php
                                    echo "Porcentagem de uso: ".$lista['porcentagem']."</br>";
                                    echo "Particao: ".$lista['particao']."</br>";
                                    ?>
                                </div>
                            </div>
                        </div>


                    </td>

                    <td>
                        <?php
                        echo $lista['disponivel']."</br>";

                        ?>
                    </td>

                </tr>


            <?php } ?>
        </div>
        </tbody>
    </table>

</div>
