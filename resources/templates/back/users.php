<div class="col-md-12">
	<div class="row">
		<h1 class="">Korisnici</h1>
	</div>
	<div class="row">
		<h4 class="bg-success"><?php displayMessage(); ?></h4>
	</div>
	<div class="row">
		<a href="index.php?add_user" class="btn btn-primary mb-2">Dodaj korisnika</a>
	</div>
	<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Korisničko ime</th>
					<th>Email</th>
					<th>Ukloni</th>
				</tr>
			</thead>
			<tbody>
				<?php displayUsersInAdmin(); ?>
			</tbody>
		</table>
	</div>
</div>