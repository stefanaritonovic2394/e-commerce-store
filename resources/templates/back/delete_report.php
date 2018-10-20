<?php

    require_once("../../config.php");

    if (isset($_GET['delete_report_id'])) {
        
        $query = query("DELETE FROM reports WHERE report_id = " . escapeString($_GET['delete_report_id']) . " ");
        confirm($query);

        setMessage("Izveštaj uspešno uklonjen");
        redirect("../../../public/admin/index.php?reports");
    } else {

        redirect("../../../public/admin/index.php?reports");
    }

?>