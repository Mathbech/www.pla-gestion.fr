<?php
function courbes($id, $timezone)
{
    require('./includes/connect.php');

    $result = $conn->query("SELECT id, SUM(prix) AS total_price FROM filament WHERE id_users = $id");
    foreach ($result as $row) {
        var_dump($row);
        ?>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Activitée récente</h4>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
                                <div class="wrapper pb-5 border-bottom">
                                    <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0 text-dark">Profit Total</p>
                                        <span class="text-success"><i class="mdi mdi-equal"></i>0.00%</span>
                                    </div>
                                    <h3 class="mb-0 text-dark font-weight-bold">0.00€</h3>
                                    <canvas id="total-profit"></canvas>
                                </div>
                                <div class="wrapper pt-5">
                                    <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0 text-dark">Dépenses</p>
                                        <span class="text-danger"><i class="mdi mdi-arrow-down"></i>800%</span>
                                    </div>
                                    <h3 class="mb-4 text-dark font-weight-bold">
                                        <?php echo ($row['total_price']); ?>
                                    </h3>
                                    <canvas id="total-expences"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
                                <div class="pl-0 pl-lg-4 ">
                                    <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                        <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                            <h3 class="text-dark font-weight-bold mr-2 mb-0"> Impressions vendues</h3>
                                            <h5 class="mb-0">( growth 0% )</h5>
                                        </div>
                                        <div class="d-lg-flex">
                                            <p class="mr-2 mb-0">Timezone:</p>
                                            <p class="text-dark font-weight-bold mb-0">
                                                <?php echo $timezone ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                                    <canvas id="device-sales"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>