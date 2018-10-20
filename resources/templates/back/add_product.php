<div class="col-md-12">
    <div class="row">
        <h1 class="">Dodaj Proizvod</h1>
    </div>
    <?php addProduct(); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="product-title">Naziv proizvoda</label>
                    <input type="text" class="form-control" name="product_title" placeholder="Unesite naziv proizvoda">
                </div>
                <div class="form-group">
                    <label for="product-description">Opis proizvoda</label>
                    <textarea name="product_description" id="" cols="30" rows="10" class="form-control" placeholder="Unesite opis proizvoda"></textarea>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="product-price">Cena proizvoda</label>
                        <input type="number" name="product_price" class="form-control" size="60" placeholder="Unesite cenu proizvoda">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-short-desc">Kratak opis proizvoda</label>
                    <textarea name="product_short_desc" id="" cols="30" rows="3" class="form-control" placeholder="Unesite kratak opis proizvoda"></textarea>
                </div>
            </div>
            <!-- /.col col-md-6 -->
            <div class="col-6 col-md-4">
                <div class="form-group">
                    <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Na čekanju">
                    <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Objavi">
                </div>
                <div class="form-group">
                    <label for="product-category">Kategorija proizvoda</label>
                    <select name="product_category_id" id="" class="form-control">
                        <option value="">Izaberite kategoriju</option>
                        <?php showCategoriesInAddProduct(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-quantity">Količina proizvoda</label>
                    <input type="number" name="product_quantity" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label for="product-keywords">Ključne reči proizvoda</label>
                    <hr>
                    <input type="text" name="product_tags" class="form-control">
                </div> -->
                <div class="form-group">
                    <label for="product-image">Slika proizvoda</label>
                    <input type="file" name="file">
                </div>
            </div>
            <!-- /.col-6 col-md-4 -->
        </div>
        <!-- /.row -->
    </form>
</div>
<!-- /.col-md-12 -->
