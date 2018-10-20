<?php

    require_once("../../config.php");

    if (isset($_GET['delete_order_id'])) {
        
        $query = query("DELETE FROM orders WHERE order_id = " . escapeString($_GET['delete_order_id']) . " ");
        confirm($query);

        setMessage("Porudžbina uspešno uklonjena");
        redirect("../../../public/admin/index.php?orders");
    } else {

        redirect("../../../public/admin/index.php?orders");
    }

?>