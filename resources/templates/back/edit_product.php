<?php

    if (isset($_GET['id'])) {

        $query = query("SELECT * FROM products WHERE product_id = " . escapeString($_GET['id']) . " ");
        confirm($query);

        while ($row = fetchArray($query)) {

            $product_category_id = $row['product_category_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_quantity = $row['product_quantity'];
            $product_description = $row['product_description'];
            $product_short_desc = $row['product_short_desc'];
            $product_image = $row['product_image'];

            $product_image = displayImage($row['product_image']);

        }

        updateProduct();

    }

?>

<div class="col-md-12">
    <div class="row">
        <h1 class="">Izmeni Proizvod</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="product-title">Naziv proizvoda</label>
                    <input type="text" class="form-control" name="product_title" value="<?php echo $product_title; ?>" placeholder="Unesite naziv proizvoda">
                </div>
                <div class="form-group">
                    <label for="product-description">Opis proizvoda</label>
                    <textarea name="product_description" id="" cols="30" rows="10" class="form-control" placeholder="Unesite opis proizvoda"><?php echo $product_description; ?></textarea>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="product-price">Cena proizvoda</label>
                        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>" placeholder="Unesite cenu proizvoda">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-short-desc">Kratak opis proizvoda</label>
                    <textarea name="product_short_desc" id="" cols="30" rows="3" class="form-control" placeholder="Unesite kratak opis proizvoda"><?php echo $product_short_desc; ?></textarea>
                </div>
            </div>
            <!-- /.col col-md-6 -->
            <div class="col-6 col-md-4">
                <div class="form-group">
                    <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Na čekanju">
                    <input type="submit" name="update" class="btn btn-primary btn-lg" value="Ažuriraj">
                </div>
                <div class="form-group">
                    <label for="product-category">Kategorija proizvoda</label>
                    <select name="product_category_id" id="" class="form-control">
                        <option value="<?php echo $product_category_id; ?>"><?php echo showProductCategory($product_category_id); ?></option>
                        <?php showCategoriesInEditProduct(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-quantity">Količina proizvoda</label>
                    <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
                </div>
                <!-- <div class="form-group">
                    <label for="product-keywords">Ključne reči proizvoda</label>
                    <hr>
                    <input type="text" name="product_tags" class="form-control">
                </div> -->
                <div class="form-group">
                    <label for="product-image">Slika proizvoda</label>
                    <input type="file" name="file"><br><br>
                    <img src="../../resources/<?php echo $product_image; ?>" width="200" alt="">
                </div>
            </div>
            <!-- /.col-6 col-md-4 -->
        </div>
        <!-- /.row -->
    </form>
</div>
<!-- /.col-md-12 -->
