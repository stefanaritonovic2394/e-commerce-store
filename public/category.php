<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">Dobrodošli na izabranu kategoriju!</h1>
            <p class="lead"></p>
        </header>

        <!-- Page Features -->
        <div class="row text-center">

            <?php getProductsByCategory(); ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
