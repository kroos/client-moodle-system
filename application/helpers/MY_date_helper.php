<?php
//the name of the file is indicated to the extend of the native date helper
#############################################################################################################################
//date format
///*
		function date_my()
			{
				return mdate("%D, %j %M %Y %g:%i %a", now());
			}

		function date_date($date)
			{
				return mdate("%D, %j %M %Y %g:%i %a", mysql_to_unix($date));
			}
//*/
#############################################################################################################################

?>