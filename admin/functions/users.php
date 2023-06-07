<?php
function users()
{
    include('./../includes/connect.php');
    try {
        $result = $conn->query("SELECT id, loggin, register_date, active FROM users");
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> id compte </th>
                    <th> loggin </th>
                    <th> Date d'enregistrement </th>
                    <th> Dernière connexion </th>
                    <th> Actif? </th>
                </tr>
            </thead>
            <?php
            // Affichage des données dans un tableau HTML
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo ($row['id']); ?>
                        </td>
                        <td>
                            <p>
                                <?php echo ($row['loggin']); ?>
                            </p>
                        </td>
                        <td>
                            <?php echo ($row['register_date']); ?>
                        </td>
                        <td>
                            Undefined
                        </td>
                        <td>
                            <?php if($row['active'] === 1){ echo ("Actif");}else{echo ("Compte désactivé");} ?>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
        <?php
    } catch (PDOException $e) {

        $conn->rollback();

        throw $e;
    }
}

?>