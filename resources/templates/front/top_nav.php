<div class="container">
    <a class="navbar-brand" href="index.php">IT Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

            <?php

                $shop_class = '';
                $login_class = '';
                $checkout_class = '';
                $contact_class = '';

                $page_name = basename($_SERVER['PHP_SELF']);

                switch ($page_name) {
                    case 'shop.php':
                        $shop_class = 'active';
                        $login_class = '';
                        $checkout_class = '';
                        $contact_class = '';
                        break;

                    case 'login.php':
                        $login_class = 'active';
                        $shop_class = '';
                        $checkout_class = '';
                        $contact_class = '';
                        break;

                    case 'checkout.php':
                        $checkout_class = 'active';
                        $shop_class = '';
                        $login_class = '';
                        $contact_class = '';
                        break;

                    case 'contact.php':
                        $contact_class = 'active';
                        $shop_class = '';
                        $login_class = '';
                        $checkout_class = '';
                        break;

                    default:
                        $shop_class = '';
                        $login_class = '';
                        $checkout_class = '';
                        $contact_class = '';
                }

            ?>

            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.php">Početna
                    <span class="sr-only">(current)</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link <?php echo $shop_class; ?>" href="shop.php">Prodavnica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $login_class; ?>" href="login.php">Logovanje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $checkout_class; ?>" href="checkout.php">Odjava (Plaćanje)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $contact_class; ?>" href="contact.php">Kontakt</a>
            </li>
        </ul>
    </div>
</div>