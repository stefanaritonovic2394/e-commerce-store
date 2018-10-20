<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            <div class="col-lg-8 offset-2">

                <h1 class="text-center mt-4 mb-4">Kontakt</h1>
                <h2 class="text-center"><?php displayMessage(); ?></h2>

                <form action="" method="post" id="contactForm">

                    <?php sendMessage(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Ime *</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Unesite Vaše ime *" required data-validation-required-message="Molimo Vas unesite Vaše ime.">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Unesite Vašu email adresu *" required data-validation-required-message="Molimo Vas unesite Vašu email adresu.">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subject">Naslov *</label>
                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Unesite naslov *" required data-validation-required-message="Molimo Vas unesite naslov poruke."">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Poruka *</label>
                                <textarea id="message" name="message" class="form-control" placeholder="Unesite Vašu poruku *" rows="4" required data-validation-required-message="Molimo Vas unesite Vašu poruku."></textarea>
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <button type="submit" name="submit" class="btn btn-success btn-send">Pošalji poruku</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
