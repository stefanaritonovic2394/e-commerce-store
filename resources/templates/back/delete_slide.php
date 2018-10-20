<?php

    require_once("../../resources/config.php");

    if (isset($_GET['delete_slide_id'])) {

    	$find_slide_image = query("SELECT slide_image FROM slides WHERE slide_id = " . escapeString($_GET['delete_slide_id']) . " LIMIT 1");
    	confirm($find_slide_image);

    	$row = fetchArray($find_slide_image);
    	$target_path = UPLOAD_DIRECTORY . DS . $row['slide_image'];
    	unlink($target_path);

        $query = query("DELETE FROM slides WHERE slide_id = " . escapeString($_GET['delete_slide_id']) . " ");
        confirm($query);

        setMessage("Slajd uspešno uklonjen");
        redirect("index.php?slides");
    } else {

        redirect("index.php?slides");
    }

?>