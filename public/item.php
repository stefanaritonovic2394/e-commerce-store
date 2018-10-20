<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Navigation -->
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>

            <?php

                $query = query("SELECT * FROM products WHERE product_id = " . escapeString($_GET['id']) . " ");
                confirm($query);

                while ($row = fetchArray($query)) :

            ?>

            <div class="col-lg-9 mb-4">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="../resources/<?php echo displayImage($row['product_image']); ?>" alt="">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row['product_title']; ?></h3>
                        <h4>&#36;<?php echo $row['product_price']; ?></h4>
                        <p class="card-text"><?php echo $row['product_description']; ?></p>
                        <a class="btn btn-primary btn-lg" href="../resources/cart.php?add=<?php echo $row['product_id']; ?>">Dodaj u korpu</a>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

            <?php endwhile; ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
