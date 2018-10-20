<div class="col-md-12">
	<div class="row">
		<h1 class="mb-4">Ažuriraj korisnika</h1>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-6 col-md-5 user_image_box">
				<a href="" data-toggle="modal" data-target="#photo-library"><img src="" alt="" class="img-responsive"></a>
			</div>
			<div class="col-6 col-md-6">
		    	<div class="form-group">
		            <input type="file" name="file">
		        </div>
		        <div class="form-group">
		            <label for="username">Korisničko ime</label>
		            <input type="text" class="form-control" name="username" placeholder="Unesite korisničko ime">
		        </div>
		        <div class="form-group">
		            <label for="firstname">Ime</label>
		            <input type="text" class="form-control" name="first_name" placeholder="Unesite ime">
		        </div>
		        <div class="form-group">
		            <label for="lastname">Prezime</label>
		            <input type="text" class="form-control" name="last_name" placeholder="Unesite prezime">
		        </div>
		        <div class="form-group">
		            <label for="email">Email</label>
		            <input type="text" class="form-control" name="email" placeholder="Unesite email adresu">
		        </div>
		        <div class="form-group">
		            <label for="password">Lozinka</label>
		            <input type="password" class="form-control" name="password" placeholder="Unesite lozinku">
		        </div>
		        <div class="form-group">
		            <a href="" id="user-id" class="btn btn-danger">Ukloni</a>
		            <input type="submit" class="btn btn-primary pull-right" name="update_user" value="Ažuriraj korisnika">
		        </div>
		    </div>
		    <!-- /.col-6 col-md-6 -->
		</div>
		<!-- /.row -->
	</form>
</div>