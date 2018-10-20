<?php addCategory(); ?>
<h1 class="mb-4">Kategorije proizvoda</h1>
<h4 class="bg-info mb-4"><?php displayMessage(); ?></h4>
<div class="row">
    <div class="col-6 col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="category-title">Naziv</label>
                <input type="text" name="cat_title" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="add_category" class="btn btn-primary" value="Dodaj kategoriju">
            </div>
        </form>
    </div>
    <!-- /.col-6 col-md-4 -->
    <div class="col-6 col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naziv</th>
                    <th>Ukloni</th>
                </tr>
            </thead>
            <tbody>
                <?php showCategoriesInAdmin(); ?>
            </tbody>
        </table>
    </div>
    <!-- /.col-6 col-md-8 -->
</div>