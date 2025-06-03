<div class="d-flex justify-content-between align-items-center">
	<h2>Create Product</h2>
</div>

<div class="mt-5">
	<form id="product-form" action="/admin/products/create" enctype="multipart/form-data" method="post">
		<div class="mb-3">
			<label for="image">Image <span>*</span></label>
			<div class="mb-2">
				<input type="file" name="image_file" id="image" accept="image/png, image/jpeg, image/jpg" hidden>
				<button class="btn btn-primary" onclick="handleUploadImage(event)">Choose image</button>
			</div>
			<div id="imagePreview" style="width: 300px; min-height: 200px; border: 1px solid #000;">
				<img id="previewImg" src="" alt="Preview" class="w-100" style="display: none;" />
			</div>
			<span id="error-image_file" class="error-message"></span>
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">Name</label>
			<input type="text" name="name" id="name" class="form-control">
			<span id="error-name" class="error-message"></span>
		</div>
		<div class="mb-3 d-flex" style="gap: 32px;">
			<div>
				<label for="price" class="form-label">Price</label>
				<input type="number" min="1" name="price" id="price" class="form-control">
				<span id="error-price" class="error-message"></span>
			</div>
			<div>
				<label for="quantity" class="form-label">Quantity</label>
				<input type="number" min="1" name="quantity" id="quantity" class="form-control">
				<span id="error-quantity" class="error-message"></span>
			</div>
		</div>
		<div class="mb-3">
			<label for="category_id" class="form-label">Category</label>
			<select name="category_id" id="category_id" class="form-select" style="width: 200px;">
				<option value="">-- Select Category --</option>
				<?php foreach ($categories as $category): ?>
					<option value="<?= $category->id ?>">
						<?= e($category->name) ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="error-category_id" class="error-message"></span>
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Description</label>
			<textarea name="description" id="description" class="form-control" rows="4"></textarea>
			<span id="error-description" class="error-message"></span>
		</div>

		<div class="mt-5">
			<button type="submit" class="btn btn-primary">Create Product</button>
		</div>
	</form>
</div>