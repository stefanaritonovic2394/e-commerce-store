<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Categories -->
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>

            <div class="col-lg-9">

                <!-- Carousel -->
                <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>

                <div class="row">

                    <?php getProducts(); ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
