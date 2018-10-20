<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h1 class="text-center mt-4 mb-4">Plaćanje</h1>
                <h4 class="text-center bg-info"><?php displayMessage(); ?></h4>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="business" value="stefanaritonovic-business@gmail.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Proizvod</th>
                                <th>Slika</th>
                                <th>Cena</th>
                                <th>Količina</th>
                                <th>Ukupno</th>
                                <th>Operacije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php cart(); ?>
                        </tbody>
                    </table>
                    <?php echo showPaypalBtn(); ?>
                </form>
            </div>
            <!-- /.col-md-12 -->

        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-md-6 offset-md-6">
                <h2 class="">Korpa</h2>
                <table class="table table-bordered" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Stavke:</th>
                            <td>
                                <h5><span class="badge badge-default">
                                    <?php

                                        echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
                                    ?>
                                </span></h5>
                            </td>
                        </tr>
                        <tr>
                            <th>Isporuka</th>
                            <td>Besplatna isporuka</td>
                        </tr>
                        <tr>
                            <th>Ukupna cena porudžbine</th>
                            <td>
                                <h5><strong><span class="badge badge-default">&#36;<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
                                </span></strong></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
