		$sql = "INSERT INTO `accounts` (`login`,`password`,`lastactive`,`access_level`,`lastIP`,`email`) VALUES " .
				"('".$login."', '".ACCOUNT::l2j_encrypt($pwd)."', '".time()."', '-1', '".$_SERVER['REMOTE_ADDR']."', '".$email."');";
		MYSQL::query($sql);

		$sql = "INSERT INTO account_data (account_name, var, value) VALUES ('".$login."' , 'activation_key', '".$this->code."');";
		MYSQL::query($sql);
		
		$sql = "UPDATE `accounts` SET `access_level` = '0' WHERE `login` = '".$login."' LIMIT 1;";
		MYSQL::query($sql);

		$sql = "DELETE FROM `account_data` WHERE `account_name` = '".$login."' AND `var` = 'activation_key' AND `value` = '".$key."' LIMIT 1;";
		MYSQL::query($sql); 