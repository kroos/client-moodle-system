<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################

//form validation through controller
//format
/*
$config = array	( 
					'controller/function' => array
					( 
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							)
					)
				);
*/
##################################################################################################

$config = array	( 
					'myilmu/login' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
							)
					),
					'myilmu/enrol' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|valid_email|is_unique[user.username]|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'password1',
								'label' => 'Password',
								'rules' => 'trim|required|matches[password2]|min_length[5]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'password2',
								'label' => 'Confirm Password',
								'rules' => 'trim|required|min_length[5]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'ic',
								'label' => 'Identity Card',
								'rules' => 'trim|required|is_natural|exact_length[12]|xss_clean'
							),
						array
							(
								'field' => 'address',
								'label' => 'Address',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'postcode',
								'label' => 'Postal Code',
								'rules' => 'trim|is_natural|exact_length[5]|xss_clean'
							),
						array
							(
								'field' => 'city',
								'label' => 'City',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'state',
								'label' => 'State',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'phone',
								'label' => 'Mobile Phone',
								'rules' => 'trim|is_natural|xss_clean'
							),
						array
							(
								'field' => 'verify',
								'label' => 'Image Verification',
								'rules' => 'trim|is_natural|exact_length[5]|required|xss_clean'
							)
					),
					'myilmu/forgot_password' => array
					(
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|valid_email|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'ic',
								'label' => 'Identity Card',
								'rules' => 'trim|required|is_natural|exact_length[12]|xss_clean'
							)
					),
					'myilmu/contact' => array
					(
						array
							(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|alpha_dash|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'message',
								'label' => 'Message',
								'rules' => 'trim|required|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'verify',
								'label' => 'Image Verification',
								'rules' => 'trim|is_natural|required|exact_length[5]|xss_clean'
							)
					),
					//user part
					'myilmu/edit' => array
					( 
						array
							(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'address',
								'label' => 'Address',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'postcode',
								'label' => 'Postal Code',
								'rules' => 'trim|required|is_natural|exact_length[5]|xss_clean'
							),
						array
							(
								'field' => 'city',
								'label' => 'City',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'state',
								'label' => 'State',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'phone',
								'label' => 'Mobile Phone',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
					),
					'myilmu/contact_admin' => array
					(
						array
							(
								'field' => 'message',
								'label' => 'Message',
								'rules' => 'trim|required|max_length[255]|xss_clean'
							)
					),
					'myilmu/change_password' => array
					(
						array
							(
								'field' => 'cpassword',
								'label' => 'Current Password',
								'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
							),
						array
							(
								'field' => 'npassword1',
								'label' => 'New Password',
								'rules' => 'trim|required|matches[npassword2]|min_length[5]|max_length[20]|xss_clean'
							),
						array
							(
								'field' => 'npassword2',
								'label' => 'Retype New Password',
								'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
							)
					),
				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */