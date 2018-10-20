<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kontrolna tabla">
            <a class="nav-link" href="index.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Kontrolna tabla</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Porudžbine">
            <a class="nav-link" href="index.php?orders">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Porudžbine</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Izveštaji">
            <a class="nav-link" href="index.php?reports">
                <i class="fa fa-fw fa-bar-chart"></i>
                <span class="nav-link-text">Izveštaji</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Proizvodi">
            <a class="nav-link" href="index.php?products">
                <i class="fa fa-fw fa-file-text"></i>
                <span class="nav-link-text">Pregled Proizvoda</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dodaj Proizvod">
            <a class="nav-link" href="index.php?add_product">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Dodaj Proizvod</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategorije">
            <a class="nav-link" href="index.php?categories">
                <i class="fa fa-fw fa-list"></i>
                <span class="nav-link-text">Kategorije</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Korisnici">
            <a class="nav-link" href="index.php?users">
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Korisnici</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Slajdovi">
            <a class="nav-link" href="index.php?slides">
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Slajdovi</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../../public/index.php">Početna</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                <?php

                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "Neregistrovani korisnik";
                    }

                ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-right dropdown-user">
                <li class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Izlogujte se</a>
                </li>
            </ul>
        </li>
    </ul>
</div>