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
                    <th> Actif? </th>
                </tr>
            </thead>
            <?php
            $i = 1;
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
                            <?php echo ($row['active']); ?>
                        </td>
                    </tr>
                </tbody>
                <?php
                $i++;
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