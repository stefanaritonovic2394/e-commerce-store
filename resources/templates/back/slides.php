<div class="col-md-12">
	<?php addSlide(); ?>
	<h3 class="bg-success mb-4"><?php displayMessage(); ?></h3>
	<div class="row">
		<div class="col-4">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
	                <input type="file" name="file">
	            </div>
	            <div class="form-group">
	                <label for="title">Naziv Slajda</label>
	                <input type="text" name="slide_title" class="form-control">
	            </div>
	            <div class="form-group">
	            	<input type="submit" name="add_slide" class="btn btn-success" value="Dodaj slajd">
	            </div>
			</form>
		</div>
		<div class="col-8">
			<?php getCurrentSlideInAdmin(); ?>
		</div>
	</div>
	<hr>
	<h1>Dostupni Slajdovi</h1>
	<div class="row">
		<?php getSlideThumbnails(); ?>
	</div>
</div>