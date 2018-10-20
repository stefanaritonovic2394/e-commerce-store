<?php

    require_once("../../config.php");

    if (isset($_GET['delete_user_id'])) {

        $query = query("DELETE FROM users WHERE user_id = " . escapeString($_GET['delete_user_id']) . " ");
        confirm($query);

        setMessage("Korisnik uspešno uklonjen");
        redirect("../../../public/admin/index.php?users");
    } else {

        redirect("../../../public/admin/index.php?users");
    }

?>