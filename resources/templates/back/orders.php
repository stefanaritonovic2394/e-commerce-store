<div class="col-md-12">
    <div class="row">
        <h1 class="">
            Sve porudžbine
        </h1>
    </div>
    <div class="row">
        <h4 class="bg-success"><?php displayMessage(); ?></h4>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Količina</th>
                    <th>Transakcija</th>
                    <th>Valuta</th>
                    <th>Status</th>
                    <th>Ukloni</th>
                </tr>
            </thead>
            <tbody>
                <?php displayOrders(); ?>
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.col-md-12 -->
