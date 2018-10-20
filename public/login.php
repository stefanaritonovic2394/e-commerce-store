<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mt-4 mb-4">Logovanje</h1>
                <h2 class="text-center bg-warning"><?php displayMessage(); ?></h2>
                <form action="" class="" method="post" enctype="multipart/form-data">

                    <?php loginUser(); ?>

                    <div class="form-group">
                        <label for="username">Korisničko ime</label>
                        <input type="text" name="username" class="form-control" placeholder="Unesite Vaše korisničko ime">
                    </div>
                    <div class="form-group">
                        <label for="password">Lozinka</label>
                        <input type="password" name="password" class="form-control" placeholder="Unesite Vašu lozinku">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Ulogujte se">
                    </div>
                </form>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
