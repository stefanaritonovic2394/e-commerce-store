<h1 class="">Svi proizvodi</h1>
<h4 class="bg-success"><?php displayMessage(); ?></h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Naziv</th>
			<th>Slika</th>
			<th>Kategorija</th>
			<th>Količina</th>
			<th>Cena</th>
			<th>Ukloni</th>
		</tr>
	</thead>
	<tbody>
		<?php getProductsInAdmin(); ?>
	</tbody>
</table>