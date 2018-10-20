<?php

    require_once("../../config.php");

    if (isset($_GET['delete_category_id'])) {
        
        $query = query("DELETE FROM categories WHERE cat_id = " . escapeString($_GET['delete_category_id']) . " ");
        confirm($query);

        setMessage("Kategorija uspešno uklonjena");
        redirect("../../../public/admin/index.php?categories");
    } else {

        redirect("../../../public/admin/index.php?categories");
    }

?>