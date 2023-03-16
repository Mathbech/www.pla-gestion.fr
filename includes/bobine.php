<?php

function card($id)
{
    include_once('includes/connect.php');
    try {
        $stm = $conn->query("SELECT Couleur, nombre, id_users FROM filament WHERE id_users = $id");

        //foreach ($result as $row) {
        while($row = $stm->fetch()){?>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Couleur bobine</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">
                            <?php echo $row['Couleur']; ?>
                        </h2>
                        <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Bobines en stock</p>
                        <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                            <?php echo $row['nombre']; ?> Bobine(s)
                        </h3>
                    </div>
                </div>
            </div>
            <?php
        }


    } catch (PDOException $e) {

        $conn->rollback();

        throw $e;
    }
}

?>