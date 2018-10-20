<?php require_once("config.php"); ?>

<?php

    if (isset($_GET['add'])) {

        $query = query("SELECT * FROM products WHERE product_id = " . escapeString($_GET['add']) . " ");
        confirm($query);

        while ($row = fetchArray($query)) {
            
            if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
                
                $_SESSION['product_' . $_GET['add']] += 1;
                redirect("../public/checkout.php");
            } else {

                setMessage("Trenutno postoje samo " . $row['product_quantity'] . " " . " proizvoda u prodavnici");
                redirect("../public/checkout.php");
            }

        }

    }

    if (isset($_GET['remove'])) {
        
        $_SESSION['product_' . $_GET['remove']] --;

        if ($_SESSION['product_' . $_GET['remove']] < 1) {

            unset($_SESSION['item_quantity']);
            unset($_SESSION['item_total']);
            redirect("../public/checkout.php");
        } else {

            redirect("../public/checkout.php");
        }

    }

    if (isset($_GET['delete'])) {

        $_SESSION['product_' . $_GET['delete']] = 0;

        unset($_SESSION['item_quantity']);
        unset($_SESSION['item_total']);

        redirect("../public/checkout.php");
    }

    function cart() {

        $total = 0;
        $item_quantity = 0;
        $item_name = 1;
        $item_number = 1;
        $amount = 1;
        $quantity = 1;

        foreach ($_SESSION as $name => $value) {

            if ($value > 0) {
                
                if (substr($name, 0, 8) == "product_") {

                    $length = strlen($name);

                    $id = substr($name, 8, $length);

                    $query = query("SELECT * FROM products WHERE product_id = " . escapeString($id) . " ");
                    confirm($query);

                    while ($row = fetchArray($query)) {

                        $subtotal = $row['product_price'] * $value;
                        $item_quantity += $value;

                        $product_image = displayImage($row['product_image']);

                        $products_cart = <<<HTML

                        <tr>
                            <td>{$row['product_title']}</td>
                            <td><img src='../resources/{$product_image}' width='100' alt=''></td>
                            <td>{$row['product_price']}</td>
                            <td>{$value}</td>
                            <td>{$subtotal}</td>
                            <td>
                                <a class='btn btn-warning' href="../resources/cart.php?remove={$row['product_id']}"><i class='fa fa-minus'></i></a>
                                <a class='btn btn-success' href="../resources/cart.php?add={$row['product_id']}"><i class='fa fa-plus'></i></a>
                                <a class='btn btn-danger' href="../resources/cart.php?delete={$row['product_id']}"><i class='fa fa-remove'></i></a>
                            </td>
                        </tr>

                        <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                        <input type="hidden" name="quantity_{$quantity}" value="{$value}">

HTML;

                        echo $products_cart;

                        $item_name ++;
                        $item_number ++;
                        $amount ++;
                        $quantity ++;

                    }

                    $_SESSION['item_total'] = $total += $subtotal;
                    $_SESSION['item_quantity'] = $item_quantity;

                }

            }

        }

    }

    function showPaypalBtn() {

        if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1) {

            $paypal_button = <<<HTML

            <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
HTML;

            return $paypal_button;

        }

    }

    function processTransaction() {

        if (isset($_GET['tx'])) {

            $amount = $_GET['amt'];
            $currency = $_GET['cc'];
            $transaction = $_GET['tx'];
            $status = $_GET['st'];

            $total = 0;
            $item_quantity = 0;

            foreach ($_SESSION as $name => $value) {

                if ($value > 0) {
                    
                    if (substr($name, 0, 8) == "product_") {

                        $length = strlen($name);
                        $id = substr($name, 8, $length);

                        $insert_order = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency) VALUES ({$amount}, '{$transaction}', '{$status}', '{$currency}')");
                        $last_id = lastId();
                        confirm($insert_order);

                        $query = query("SELECT * FROM products WHERE product_id = " . escapeString($id) . " ");
                        confirm($query);

                        while ($row = fetchArray($query)) {

                            $product_price = $row['product_price'];
                            $product_title = $row['product_title'];
                            $subtotal = $row['product_price'] * $value;
                            $item_quantity += $value;

                            $insert_report = query("INSERT INTO reports (product_id, order_id, product_price, product_title, product_quantity) VALUES ({$id}, {$last_id}, '{$product_price}', '{$product_title}', '{$value}')");
                            confirm($insert_report);

                        }

                        $total += $subtotal;
                        //echo $item_quantity;

                    }

                }

            }

            session_destroy();

        } else {

            redirect("index.php");
        }

    }

?>
