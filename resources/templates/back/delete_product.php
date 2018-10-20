<?php

    require_once("../../config.php");

    if (isset($_GET['delete_product_id'])) {
        
        $query = query("DELETE FROM products WHERE product_id = " . escapeString($_GET['delete_product_id']) . " ");
        confirm($query);

        setMessage("Proizvod uspešno uklonjen");
        redirect("../../../public/admin/index.php?products");
    } else {

        redirect("../../../public/admin/index.php?products");
    }

?>