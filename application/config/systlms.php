<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#############################################################################################
//Website
$config['title'] = 'E-Learning';

#############################################################################################
//Facebook
//optional. if u have a fan page just insert the URL of your fan page otherwise leave it blank.
//more info => https://developers.facebook.com/docs/guides/web/#plugins
//example : 
$config['facebook'] = 'https://www.facebook.com/pages/A3-Revive/279787298733680';

#############################################################################################
//Paypal
//optional. same as facebook configuration section
$config['payemail'] = 'azaliha@gmail.com';										//if u dont set anything, donation page will not appear
$config['paypickupline'] = 'this should be your donation pick up line. just put in nice word to persuade them make a donation to ur server';

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
$config['username'] = 'a3outlaw@gmail.com';				//gmail username
$config['password'] = '0162172420';				//gmail password
$config['addreplyto_email'] = 'admin@localhost.com';					//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = 'Admin';					//example, [GM]Cabal
$config['from'] = 'admin@localhost.com';								//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = 'Admin';							//example [GM]Cabal

#############################################################################################
//admin email
$config['admin_email'] = 'dhiauddin@gmail.com';			//user for "contact us" page

#############################################################################################
//moodle login
$config['moodle_login'] = 'http://localhost/moodle/login/index.php';

#############################################################################################
//forgot password URL
$config['forgot_password'] = 'http://a3ncabalload.dyndns.info/myilmu/forgot_password';

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
//payment. how many days payment must be made
$config['day_payment'] = 7;

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################

/* End of file cabal.php */
/* Location: ./application/config/systlms.php */
