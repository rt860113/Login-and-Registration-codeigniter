<?php
$config=array(
		'register'=>array(
						array(
							'field'=>'first_name',
							'label'=>'First Name',
							'rules'=>'trim|required|alpha'),
						array(
							'field'=>'last_name',
							'label'=>'Last Name',
							'rules'=>'trim|required|alpha'),
						array(
							'field'=>'email',
							'label'=>'Email',
							'rules'=>'trim|required|is_unique[users.email]|valid_email'),
						array(
							'field'=>'password',
							'label'=>'Password',
							'rules'=>'trim|required|matches[c_password]|min_length[8]'),
						array(
							'field'=>'c_password',
							'label'=>'Confirm Password',
							'rules'=>'trim|required|')
						),
		'login'=>array(
					array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|required|valid_email'),
					array(
						'field'=>'password',
						'label'=>'Password',
						'rules'=>'trim|required|min_length[8]')
						)
			);


?>