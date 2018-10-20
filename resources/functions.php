<?php

	$upload_directory = "uploads";

	// Helper funkcije

	function redirect($location) {

		header("Location: $location");
	}

	function query($sql) {

		global $connection;
		return mysqli_query($connection, $sql);
	}

	function confirm($result) {

		global $connection;

		if (!$result) {
			die("Upit nije uspeo " . mysqli_error($connection));
		}
	}

	function escapeString($string) {

		global $connection;
		return mysqli_real_escape_string($connection, $string);
	}

	function fetchArray($result) {

		return mysqli_fetch_array($result);
	}

	function setMessage($msg) {

		if (!empty($msg)) {
			
			$_SESSION['message'] = $msg;
		} else {

			$msg = "";
		}

	}

	function displayMessage() {

		if (isset($_SESSION['message'])) {
			
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}

	}

	function lastId() {

		global $connection;

		return mysqli_insert_id($connection);
	}

	/************************* FRONT-END FUNKCIJE *************************/

	function getProducts() {

		$query = query("SELECT * FROM products");
		confirm($query);

		$rows = mysqli_num_rows($query);

		if (isset($_GET['page'])) {
			
			$page = preg_replace('#[^0-9]#', '', $_GET['page']);

		} else {

			$page = 1;
		}

		$perPage = 6;
		$lastPage = ceil($rows / $perPage);

		if ($page < 1) {
			
			$page = 1;
		} elseif ($page > $lastPage) {
			
			$page = $lastPage;
		}

		$middleNumbers = '';

		$sub1 = $page - 1;
		$sub2 = $page - 2;
		$add1 = $page + 1;
		$add2 = $page + 2;

		if ($page == 1) {

			$middleNumbers .= '<li class="page-item active"><span class="page-link">' .$page. '</span></li>';

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

		} elseif ($page == $lastPage) {

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

			$middleNumbers .= '<li class="page-item active"><span class="page-link">' .$page. '</span></li>';

		} elseif ($page > 2 && $page < ($lastPage - 1)) {

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

			$middleNumbers .= '<li class="page-item active"><span class="page-link">' .$page. '</span></li>';

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';

		} elseif ($page > 1 && $page < $lastPage) {
			
			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

			$middleNumbers .= '<li class="page-item active"><span class="page-link">' .$page. '</span></li>';

			$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

		}

		$limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;

		$select_products_limit = query("SELECT * FROM products $limit");
		confirm($select_products_limit);

		$outputPagination = "";

		if ($page != 1) {
			
			$prev = $page - 1;
			$outputPagination .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Prethodna</a></li>';
		}

		$outputPagination .= $middleNumbers;

		if ($page != $lastPage) {
			
			$next = $page + 1;
			$outputPagination .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Sledeća</a></li>';
		}

		while ($row = fetchArray($select_products_limit)) {

			$product_image = displayImage($row['product_image']);

			$product = <<<HTML

			<div class="col-lg-4 col-md-6 mb-4">
	            <div class="card h-100">
	                <a href="item.php?id={$row['product_id']}"><img style="height:144px" class="card-img-top" src="../resources/{$product_image}" alt=""></a>
	                <div class="card-body">
	                    <h4 class="card-title">
	                        <a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
	                    </h4>
	                    <h5>&#36;{$row['product_price']}</h5>
	                    <p class="card-text">{$row['product_short_desc']}</p>
	                </div>
	                <div class="card-footer">
	                    <a class="btn btn-primary" href="../resources/cart.php?add={$row['product_id']}">Dodaj u korpu</a>
	                </div>
	            </div>
	        </div>

HTML;

			echo $product;

		}

		echo "<div class='container'><ul class='pagination justify-content-center'>{$outputPagination}</ul></div>";

	}

	function getCategories() {

		$query = query("SELECT * FROM categories");
		confirm($query);

		while ($row = fetchArray($query)) {

			$category = <<<HTML

			<a href="category.php?id={$row['cat_id']}" class='list-group-item'>{$row['cat_title']}</a>

HTML;
			echo $category;
		}
	}

	function getProductsByCategory() {

		$query = query("SELECT * FROM products WHERE product_category_id = " . escapeString($_GET['id']) . " ");
		confirm($query);

		while ($row = fetchArray($query)) {

			$product_image = displayImage($row['product_image']);

			$product_category = <<<HTML

			<div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <a href="item.php?id={$row['product_id']}"><img class="card-img-top" src="../resources/{$product_image}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        	<a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                        </h4>
                        <p class="card-text">{$row['product_description']}</p>
                    </div>
                    <div class="card-footer">
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Kupite Sada!</a>
                    </div>
                </div>
            </div>

HTML;

			echo $product_category;

		}
	}

	function getProductsInShop() {

		$query = query("SELECT * FROM products");
		confirm($query);

		while ($row = fetchArray($query)) {

			$product_image = displayImage($row['product_image']);

			$product = <<<HTML

			<div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="../resources/{$product_image}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{$row['product_title']}</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                    </div>
                    <div class="card-footer">
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Kupite Sada!</a>
                    </div>
                </div>
            </div>

HTML;

			echo $product;

		}
	}

	function loginUser() {

		if (isset($_POST['submit'])) {
			
			$username = escapeString($_POST['username']);
			$password = escapeString($_POST['password']);

			$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
			confirm($query);

			if (mysqli_num_rows($query) == 0) {
				
				setMessage("Vaše korisničko ime ili lozinka nisu tačni");
				redirect("login.php");

			} else {

				$_SESSION['username'] = $username;
				// setMessage("Dobrodošli na stranu administratora");
				redirect("admin");

			}

		}
	}

	function sendMessage() {

		if (isset($_POST['submit'])) {

			$to = "stefanaritonovic@gmail.com";
			$name = $_POST['name'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$header = "From: {$name} {$email}";

			$result = mail($to, $subject, $message, $header);

			if (!$result) {
				setMessage("Greška prilikom slanja poruke!");
				redirect("contact.php");
			} else {
				setMessage("Poruka uspešno poslata");
				redirect("contact.php");
			}

		}
	}

	/************************* BACK-END FUNKCIJE *************************/

	function displayOrders() {

		$query = query("SELECT * FROM orders");
		confirm($query);

		while ($row = fetchArray($query)) {
			
			$orders = <<<HTML

			<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency']}</td>
                <td>{$row['order_status']}</td>
                <td><a href="../../resources/templates/back/delete_order.php?delete_order_id={$row['order_id']}" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
            </tr>
HTML;

			echo $orders;

		}

	}

	function displayImage($image) {

		global $upload_directory;

		return $upload_directory . DS . $image;
	}

	function getProductsInAdmin() {

		$query = query("SELECT * FROM products");
		confirm($query);

		while ($row = fetchArray($query)) {

			$product_category = showProductCategory($row['product_category_id']);

			$product_image = displayImage($row['product_image']);

			$product = <<<HTML

			<tr>
				<td>{$row['product_id']}</td>
				<td>{$row['product_title']}</td>
				<td><a href="index.php?edit_product&id={$row['product_id']}"><img src="../../resources/{$product_image}" width="100" alt=""></a></td>
				<td>{$product_category}</td>
				<td>{$row['product_quantity']}</td>
				<td>{$row['product_price']}</td>
				<td><a href="../../resources/templates/back/delete_product.php?delete_product_id={$row['product_id']}" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
			</tr>

HTML;

			echo $product;

		}

	}

	function showProductCategory($product_category_id) {

		$select_category = query("SELECT * FROM categories WHERE cat_id = {$product_category_id}");
		confirm($select_category);

		while ($category_row = fetchArray($select_category)) {
			
			return $category_row['cat_title'];
		}

	}

	function showCategoriesInEditProduct() {

		global $product_category_id;

		$query = query("SELECT * FROM categories");
		confirm($query);

		while ($row = fetchArray($query)) {

			if ($product_category_id != $row['cat_id']) {

				$category_options = <<<HTML

			<option value="{$row['cat_id']}">{$row['cat_title']}</option>

HTML;
			} else {

				$category_options = "";
			}

			echo $category_options;

		}

	}

	function addProduct() {

		if (isset($_POST['publish'])) {

			$product_category_id = escapeString($_POST['product_category_id']);
			$product_title = escapeString($_POST['product_title']);
			$product_price = escapeString($_POST['product_price']);
			$product_quantity = escapeString($_POST['product_quantity']);
			$product_description = escapeString($_POST['product_description']);
			$product_short_desc = escapeString($_POST['product_short_desc']);
			$product_image = escapeString($_FILES['file']['name']);
			$temp_image_location = $_FILES['file']['tmp_name'];

			move_uploaded_file($temp_image_location, UPLOAD_DIRECTORY . DS . $product_image);

			$insert_product = query("INSERT INTO products (product_category_id, product_title, product_price, product_quantity, product_description, product_short_desc, product_image) VALUES ('{$product_category_id}', '{$product_title}', '{$product_price}', '{$product_quantity}', '{$product_description}', '{$product_short_desc}', '{$product_image}')");
			$lastId = lastId();
			confirm($insert_product);
			setMessage("Proizvod sa id-em {$lastId} je uspešno dodat");
			redirect("index.php?products");

		}

	}

	function showCategoriesInAddProduct() {

		$query = query("SELECT * FROM categories");
		confirm($query);

		while ($row = fetchArray($query)) {

			$category_option = <<<HTML

			<option value="{$row['cat_id']}">{$row['cat_title']}</option>

HTML;
			echo $category_option;
		}
	}

	function updateProduct() {

		if (isset($_POST['update'])) {

			$product_category_id = escapeString($_POST['product_category_id']);
			$product_title = escapeString($_POST['product_title']);
			$product_price = escapeString($_POST['product_price']);
			$product_quantity = escapeString($_POST['product_quantity']);
			$product_description = escapeString($_POST['product_description']);
			$product_short_desc = escapeString($_POST['product_short_desc']);
			$product_image = escapeString($_FILES['file']['name']);
			$temp_image_location = $_FILES['file']['tmp_name'];

			if (empty($product_image)) {

				$get_image_query = query("SELECT product_image FROM products WHERE product_id = ". escapeString($_GET['id']) . " ");
				confirm($get_image_query);

				while ($image = fetchArray($get_image_query)) {
					
					$product_image = $image['product_image'];
				}

			}

			move_uploaded_file($temp_image_location, UPLOAD_DIRECTORY . DS . $product_image);

			$update_product = "UPDATE products SET ";
			$update_product .= "product_category_id = '{$product_category_id}', ";
			$update_product .= "product_title = '{$product_title}', ";
			$update_product .= "product_price = '{$product_price}', ";
			$update_product .= "product_quantity = '{$product_quantity}', ";
			$update_product .= "product_description = '{$product_description}', ";
			$update_product .= "product_short_desc = '{$product_short_desc}', ";
			$update_product .= "product_image = '{$product_image}' ";
			$update_product .= "WHERE product_id = " . escapeString($_GET['id']);

			$update_product_query = query($update_product);
			confirm($update_product_query);
			setMessage("Proizvod je uspešno ažuriran");
			redirect("index.php?products");

		}

	}

	function showCategoriesInAdmin() {

		$category_query = query("SELECT * FROM categories");
		confirm($category_query);

		while ($row = fetchArray($category_query)) {
			
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			$category = <<<HTML

			<tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a href="../../resources/templates/back/delete_category.php?delete_category_id={$row['cat_id']}" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
            </tr>

HTML;

			echo $category;

		}

	}

	function addCategory() {

		if (isset($_POST['add_category'])) {
			
			$cat_title = escapeString($_POST['cat_title']);
			$select_cat = "SELECT * FROM categories WHERE cat_title = '{$cat_title}'";
			$resultSet = query($select_cat);

			if (mysqli_num_rows($resultSet) > 0) {
				
				setMessage("Kategorija sa tim nazivom već postoji");
			} else {

				$insert_cat = query("INSERT INTO categories (cat_title) VALUES ('{$cat_title}')");
				confirm($insert_cat);
				setMessage("Kategorija uspešno dodata");
			}

		}

	}

	function displayUsersInAdmin() {

		$users_query = query("SELECT * FROM users");
		confirm($users_query);

		while ($row = fetchArray($users_query)) {

			$user_id = $row['user_id'];
			$username = $row['username'];
			$email = $row['email'];
			$password = $row['password'];

			$user = <<<HTML

			<tr>
				<td>{$user_id}</td>
				<td>{$username}</td>
				<td>{$email}</td>
				<td><a href="../../resources/templates/back/delete_user.php?delete_user_id={$row['user_id']}" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
			</tr>

HTML;

			echo $user;

		}

	}

	function addUser() {

		if (isset($_POST['add_user'])) {
			
			$username = escapeString($_POST['username']);
			$email = escapeString($_POST['email']);
			$password = escapeString($_POST['password']);
			// $user_image = escapeString($_FILES['file']['name']);
			// $temp_image = $_FILES['file']['tmp_name'];

			// move_uploaded_file($temp_image, UPLOAD_DIRECTORY . DS . $user_image);

			$insert_user_query = query("INSERT INTO users (username, email, password) VALUES ('{$username}', '{$email}', '{$password}')");
			confirm($insert_user_query);

			setMessage("Korisnik uspešno dodat");
			redirect("index.php?users");
		}

	}

	function getReportsInAdmin() {

		$query = query("SELECT * FROM reports");
		confirm($query);

		while ($row = fetchArray($query)) {

			$report = <<<HTML

			<tr>
				<td>{$row['report_id']}</td>
				<td>{$row['product_id']}</td>
				<td>{$row['order_id']}</td>
				<td>{$row['product_title']}</td>
				<td>{$row['product_quantity']}</td>
				<td>{$row['product_price']}</td>
				<td><a href="../../resources/templates/back/delete_report.php?delete_report_id={$row['report_id']}" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
			</tr>

HTML;

			echo $report;

		}

	}

	function addSlide() {

		if (isset($_POST['add_slide'])) {
			
			$slide_title = escapeString($_POST['slide_title']);
			$slide_image = escapeString($_FILES['file']['name']);
			$temp_slide_image = $_FILES['file']['tmp_name'];

			if (empty($slide_title) || empty($slide_image)) {
				
				echo "<h4 class='bg-warning mb-4'>Ova polja ne mogu da budu prazna!</h4>";
			} else {

				move_uploaded_file($temp_slide_image, UPLOAD_DIRECTORY . DS . $slide_image);

				$insert_slide = query("INSERT INTO slides (slide_title, slide_image) VALUES ('{$slide_title}', '{$slide_image}')");
				confirm($insert_slide);
				setMessage("Slajd uspešno dodat");
				// redirect("index.php?slides");
			}

		}

	}

	function getCurrentSlideInAdmin() {

		$select_current_slide = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
		confirm($select_current_slide);

		while ($row = fetchArray($select_current_slide)) {

			$slide_image = displayImage($row['slide_image']);

			$slide_current = <<<HTML

            <img class="d-block img-fluid" src="../../resources/{$slide_image}" alt="">

HTML;

			echo $slide_current;

		}

	}

	function getActiveSlide() {

		$select_active_slide = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
		confirm($select_active_slide);

		while ($row = fetchArray($select_active_slide)) {

			$slide_image = displayImage($row['slide_image']);

			$slide_active = <<<HTML

			<div class="carousel-item active">
            	<img class="d-block img-fluid" src="../resources/{$slide_image}" alt="">
        	</div>

HTML;

			echo $slide_active;

		}

	}

	function getSlides() {

		$select_slide_query = query("SELECT * FROM slides");
		confirm($select_slide_query);

		while ($row = fetchArray($select_slide_query)) {

			$slide_image = displayImage($row['slide_image']);

			$slide = <<<HTML

			<div class="carousel-item">
            	<img class="d-block img-fluid" src="../resources/{$slide_image}" alt="">
        	</div>

HTML;

			echo $slide;

		}

	}

	function getSlideThumbnails() {

		$select_slide_thumb = query("SELECT * FROM slides ORDER BY slide_id ASC");
		confirm($select_slide_thumb);

		while ($row = fetchArray($select_slide_thumb)) {

			$slide_image = displayImage($row['slide_image']);

			$slide_thumb = <<<HTML

            <div class="col-6 col-md-3 image_container">
				<a href="index.php?delete_slide_id={$row['slide_id']}">
					<img class="img-fluid img-thumbnail mb-4" src="../../resources/{$slide_image}" alt="">
				</a>
				<div class="figure-caption">
					<p>{$row['slide_title']}</p>
				</div>
			</div>

HTML;

			echo $slide_thumb;

		}

	}

?>