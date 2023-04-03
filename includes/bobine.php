<?php
function card($id)
{
    include('includes/connect.php');
    try {
        $result = $conn->query("SELECT categorie, couleur, id, SUM(nombre) AS total_nombre FROM filament WHERE id_users = $id GROUP BY categorie, couleur");


        // var_dump($result);
            foreach ($result as $row) {

                $type = $row['categorie'];
                $color = $row['couleur'];
                $nb = $row['total_nombre'];

                ?>

                <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Type de filament</h5>
                            <h2 class="mb-0 font-weight-bold mt-2 text-dark">
                                <?php echo $type; ?>
                            </h2>

                            <h5 class="mt-4 mb-0">Couleur bobine</h5>
                            <h2 class="mb-0 font-weight-bold mt-2 text-dark">
                                <?php echo $color; ?>
                            </h2>

                            <p class="mt-4 mb-0">Bobines en stock</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                                <?php echo $nb;
                                if ($nb < 2) {
                                    echo (' Bobine');
                                } else {
                                    echo (' Bobines');
                                } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <?php
            }
        if(empty($row)){
            ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-0 font-weight-bold mt-2 text-dark">
                                Votre stock est vide
                            </h2>
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