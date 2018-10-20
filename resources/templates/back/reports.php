<h1 class="">Svi izveštaji</h1>
<h4 class="bg-success"><?php displayMessage(); ?></h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Id Proizvoda</th>
			<th>Id Porudžbine</th>
			<th>Naziv</th>
			<th>Količina</th>
			<th>Cena</th>
			<th>Ukloni</th>
		</tr>
	</thead>
	<tbody>
		<?php getReportsInAdmin(); ?>
	</tbody>
</table>