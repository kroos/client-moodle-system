<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#############################################################################################
//Website
$config['title'] = 'Pondok Ilmu Dunia Akhirat';

#############################################################################################
//payment. how many days payment must be made
$config['day_payment'] = 7;

#############################################################################################
//Mailer Configurations
//pop3 server and port
$config['pop3_server'] = 'pop.gmail.com';
$config['pop3_port'] = 995;

//smtp server
$config['SMTP_auth'] = TRUE;
$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_port'] = 465;
$config['SMTP_Secure'] = 'ssl';

//email account from sender associated to the pop3 n smtp server settings.
$config['username'] = 'dhiauddin@myilmu.edu.my';				//gmail username
$config['password'] = '0162172420';								//gmail password
$config['addreplyto_email'] = 'shaharudin@myilmu.edu.my';		//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = 'Admin';							//example, [GM]Cabal
$config['from'] = 'shaharudin@myilmu.edu.my';					//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = 'Admin';									//example [GM]Cabal

#############################################################################################
//admin email
$config['admin_email'] = 'shaharudin@myilmu.edu.my';			//user for "contact us" page

#############################################################################################
//moodle login
$config['moodle_login'] = 'http://www.pida.myilmu.edu.my/login/index.php';

#############################################################################################
//forgot password URL
$config['forgot_password'] = 'http://userlms.myilmu.edu.my/myilmu/forgot_password';

#############################################################################################
//state
$config['state'] = array
						(
							'' => 'State',
							'Selangor' => 'Selangor',
							'Johor' => 'Johor',
							'Sabah' => 'Sabah',
							'Kuala Lumpur' => 'Kuala Lumpur',
							'Perak' => 'Perak',
							'Pulau Pinang' => 'Pulau Pinang',
							'Sarawak' => 'Sarawak',
							'Kedah' => 'Kedah',
							'Pahang' => 'Pahang',
							'Melaka' => 'Melaka',
							'Negeri Sembilan' => 'Negeri Sembilan',
							'Kelantan' => 'Kelantan',
							'Terengganu' => 'Terengganu',
							'Perlis' => 'Perlis',
							'Labuan' => 'Labuan'
						);

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################

/* End of file cabal.php */
/* Location: ./application/config/systlms.php */
