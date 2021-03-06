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
					'myilmu/index' => array
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
								'label' => 'Email Address',
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
								'rules' => 'trim|required|is_unique[user.IC]|is_natural|exact_length[12]|xss_clean'
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
					'myilmu/add_course' => array
					(
						array
							(
								'field' => 'code_course',
								'label' => 'Code Course',
								'rules' => 'trim|required|min_length[2]|is_unique[course.code_course]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'course',
								'label' => 'Course Name',
								'rules' => 'trim|required|is_unique[course.course]|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'description',
								'label' => 'Description',
								'rules' => 'trim|required|is_unique[course.description]|min_length[5]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'cost',
								'label' => 'Fees',
								'rules' => 'trim|required|is_natural|min_length[1]|max_length[5]|xss_clean'
							)
					),
					'myilmu/update_course' => array
					(
						array
							(
								'field' => 'code_course',
								'label' => 'Code Course',
								'rules' => 'trim|required|min_length[2]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'course',
								'label' => 'Course Name',
								'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'description',
								'label' => 'Description',
								'rules' => 'trim|required|min_length[5]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'cost',
								'label' => 'Fees',
								'rules' => 'trim|required|is_natural|min_length[1]|max_length[5]|xss_clean'
							)
					),
					'myilmu/bursary' => array
					(
						array
							(
								'field' => 'case[]',
								'label' => 'CheckBox',
								'rules' => 'trim|required|is_natural|xss_clean'
							)
					),
					'myilmu/upd_payment' => array
					(
						array
							(
								'field' => 'id',
								'label' => 'ID Payment',
								'rules' => 'trim|required|is_natural|min_length[1]|xss_clean'
							),
						array
							(
								'field' => 'payment',
								'label' => 'Payment Amount',
								'rules' => 'trim|required|is_natural|min_length[1]|xss_clean'
							),
						array
							(
								'field' => 'date_payment',
								'label' => 'Payment Date',
								'rules' => 'trim|required|exact_length[10]|xss_clean'
							),
						array
							(
								'field' => 'id_bank',
								'label' => 'Payment Bank',
								'rules' => 'trim|required|is_natural|min_length[1]|xss_clean'
							),
						array
							(
								'field' => 'paid',
								'label' => 'Paid',
								'rules' => 'trim|required|is_natural|exact_length[1]|xss_clean'
							),
						array
							(
								'field' => 'remarks',
								'label' => 'Remarks',
								'rules' => 'trim|required|xss_clean'
							),
					),
					'myilmu/stud_payment' => array
					(
						array
							(
								'field' => 'payment_status',
								'label' => 'Payment Status',
								'rules' => 'trim|required|is_natural|exact_length[1]|xss_clean'
							),
					),
					'myilmu/user' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Email Address',
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
								'field' => 'group',
								'label' => 'Group',
								'rules' => 'trim|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'ic',
								'label' => 'Identity Card',
								'rules' => 'trim|required|is_unique[user.IC]|is_natural|exact_length[12]|xss_clean'
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
								'field' => 'role',
								'label' => 'User Role',
								'rules' => 'trim|is_natural|required|xss_clean'
							),
						array
							(
								'field' => 'course',
								'label' => 'User to the course of',
								'rules' => 'trim|is_natural|required|xss_clean'
							)
					),
					'myilmu/teacher' => array
					(
						array
							(
								'field' => 'teacher',
								'label' => 'Teacher',
								'rules' => 'trim|required|valid_email|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'course',
								'label' => 'Course',
								'rules' => 'required|xss_clean'
							)
					),
					'myilmu/group' => array
					(
						array
							(
								'field' => 'group',
								'label' => 'Group',
								'rules' => 'required|trim|is_unique[group.group]|xss_clean'
							)
					),
					'myilmu/edit_group' => array
					(
						array
							(
								'field' => 'group',
								'label' => 'Group',
								'rules' => 'required|trim|xss_clean'
							)
					),
				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
