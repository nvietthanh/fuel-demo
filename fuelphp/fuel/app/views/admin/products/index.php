<div class="d-flex justify-content-between align-items-center">
	<h2>Product List</h2>
	<div>
		<button class="btn btn-primary" onclick="handleCreateProduct()">Create product</button>
	</div>
</div>
<div class="mt-5">
	<div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($products)): ?>
					<?php foreach ($products as $product): ?>
						<tr data-id="<?= $product->id ?>">
							<td><?= $product->id ?></td>
							<td>
								<a href="/admin/product/<?= $product->id ?>/edit"><?= htmlspecialchars($product->name) ?></a>
							</td>
							<td><?= number_format($product->price ?? 0) ?></td>
							<td><?= $product->quantity ?? 0 ?></td>
							<td><?= isset($product->category) ? htmlspecialchars($product->category->name) : 'N/A' ?></td>
							<td><?= !empty($product->created_at) ? date('Y-m-d H:i', $product->created_at) : 'N/A' ?></td>
							<td><?= !empty($product->updated_at) ? date('Y-m-d H:i', $product->updated_at) : 'N/A' ?></td>
							<td>
								<button class="btn btn-primary" onclick="handleEditProduct(<?= $product->id ?>)">
									Edit
								</button>
								<button class="btn btn-danger" onclick="handleDeleteProduct(<?= $product->id ?>)">
									Delete
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="8" class="text-center text-muted">No data available.</td>
					</tr>
				<?php endif; ?>
			</tbody>

		</table>

		<?php if (!empty($products)): ?>
			<div class="pagination-wrapper">
				<div class="pagination-total">
					Showing <?= $pagination['from'] ?> – <?= $pagination['to'] ?> of <?= $pagination['total'] ?> items
				</div>
				<div class="pagination-main">
					<?= $pagination['links'] ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>