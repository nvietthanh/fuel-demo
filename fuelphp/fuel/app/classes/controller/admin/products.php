<?php

use Fuel\Core\HttpBadRequestException;
use Fuel\Core\Input;

class Controller_Admin_Products extends Controller_Admin_Base_Auth
{
	public $template = 'layouts/admin';

	public function action_index()
	{
		$total = Model_Product::query()->count();

		Pagination::set_config(array(
			'pagination_url' => Uri::create('admin/products'),
			'total_items'    => $total,
			'per_page'       => 2,
			'uri_segment'    => 'page',
		));

		$offset = Pagination::get('offset');
		$limit = Pagination::get('per_page');
		$from = $offset + 1;
		$to = min($offset + $limit, $total);

		$data['products'] = Model_Product::query()
			->select('id', 'name', 'price', 'quantity', 'category_id', 'created_at', 'updated_at')
			->related('category')
			->rows_offset(Pagination::get('offset'))
			->rows_limit(Pagination::get('per_page'))
			->get();

		$data['pagination'] = [
			'from' => $from,
			'to' => $to,
			'total' => $total,
			'links' => Pagination::create_links(),
		];

		$this->template->title = 'Manage product';
		$this->template->content = View::forge('admin/products/index', $data, false);
		$this->template->js = 'admin/product/list.js';
	}

	public function action_create()
	{
		$data['categories'] = Model_Category::find('all');

		$this->template->title = 'Create product';
		$this->template->content = View::forge('admin/products/create', $data);
		$this->template->js = [
			'admin/product/create.js',
			'admin/form/form.js',
		];
	}

	public function action_store()
	{
		if (Input::method() == 'POST') {
			$val = Validation::forge();

			Config::load('upload', true);

			// Khởi tạo upload
			Upload::process(Config::get('upload.default'));

			if (Upload::is_valid()) {
				Upload::save();

				$files = Upload::get_files();

				foreach ($files as $file) {
					echo "File uploaded: " . $file['saved_as'] . "<br>";
				}
			} else {
				$errors = Upload::get_errors();
				foreach ($errors as $error) {
					echo "Error: " . $error['errors'][0]['message'] . "<br>";
				}
			}

			var_dump(Input::all());
			die();

			$val->add('name', 'name')->add_rule('required');
			$val->add('price', 'price')->add_rule('required');
			$val->add('quantity', 'quantity')->add_rule('required');
			$val->add('category_id', 'category id')->add_rule('required');
			$val->add('description', 'description')->add_rule('required');
			$val->add('image_file', 'Image')
				->add_rule('required')
				->add_rule('valid_file_type', array('image/jpeg', 'image/png', 'image/jpg'));

			var_dump(Input::all());
			die();

			if (!$val->run()) {
				$errors = Helpers_Validation::getErrors($val);

				return $this->jsonResponse($errors, 'Validation failed', 422);
			}

			return $this->jsonResponse(null, 'Created successfully!', 200);
		}
	}

	public function action_delete($id)
	{
		if (Input::method() !== 'DELETE') {
			return $this->jsonResponse(null, 'Invalid request method', 405);
		}

		$product = Model_Product::find($id);

		if (!$product) {
			return $this->jsonResponse(null, 'Product not found', 404);
		}

		try {
			$product->delete();

			return $this->jsonResponse(null, 'Product deleted successfully');
		} catch (\Exception $e) {
			return $this->jsonResponse(null, 'Failed to delete product', 500);
		}
	}
}
