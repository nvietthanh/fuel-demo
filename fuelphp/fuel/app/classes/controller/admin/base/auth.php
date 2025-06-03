<?php

class Controller_Admin_Base_Auth extends Controller_Base
{
	public function before()
	{
		parent::before();

		$uri = Uri::string();
		$is_logged_in = Auth::check();

		if (!$is_logged_in && $uri !== 'admin/login') {
			Response::redirect('admin/login');
		}

		if ($is_logged_in && $uri === 'admin/login') {
			Response::redirect('admin/products');
		}
	}
}
