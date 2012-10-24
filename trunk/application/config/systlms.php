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
$config['addreplyto_email'] = 'admin@domain.com';					//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = '[GM]Cabal';					//example, [GM]Cabal
$config['from'] = 'admin@domain.com';								//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = '[GM]Cabal';							//example [GM]Cabal

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################

/* End of file cabal.php */
/* Location: ./application/config/cabal.php */
