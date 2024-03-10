<?php

	include_once("./functions.php"); error_reporting(0);
	
	function birth() {
		$con = connect();
		// row birth from DB
		$query = "SELECT * from users WHERE month(current_date)=month(birth) AND day(current_date)=day(birth)";
		$fire = mysqli_query($con, $query);
		$count=mysqli_num_rows($fire);


		// Database users
		if (mysqli_num_rows($fire) >= 0) {

			while ($row = mysqli_fetch_array($fire)) {
				$age = date('md', strtotime($row['birth'])) > date('md') ? date('Y') - date('Y', strtotime($row['birth'])) - 1 : date('Y') - date('Y', strtotime($row['birth']));

				notify(ucwords($row['username']) . " have a ". $age ."th birthday today!!! ".date("d.m.Y", strtotime($row['birth'])));
			}
		}

		// (Non-registered) Whitelisted users
		if (true) {
			$array = array(
				"Eldar" => "19.2",
				"Michal.F" => "14.2",
				"Ilya" => "15.1",
				"Anett" => "10.11",
				"Николай Суханов" => "29.10",
				"Гулинька" => "1.5",
				"Мама" => "11.3",
				"Отец" => "23.9",
				"Юля Карманова" => "15.11",
				"Настя Беляева" => "9.4",
				"Anna Sukhotska" => "12.12",
				"Ирина (мама Анны)" => "31.5",
				"Emre" => "28.7",

				#Prace 
				"Dorota" => "6.9",
				"Tumič" => "7.4",
				"Páleníček" => "11.10",
				"Test" => "6.3",

				#Datart
				"Ivan Popovych" => "22.01",
				"Martin Leščák" => "03.02",
				"Patrik Procák" => "11.02",
				"Dominik Staněk" => "07.04",
				"Věra Muchová" => "14.05",
				"Jarda Bureš" => "07.06",
				"Tomáš Dvořák" => "29.06",
				"Daniel Kotous" => "18.07",
				"Lukáš Walach" => "01.08",
				"Tymon Hess" => "15.08",
				"Leoš Bílek" => "15.09",
				"Tomáš Jindra" => "11.10",
				"Matuš Demčák" => "16.10",
				"Martin Petříček" => "23.10",
				"Martin Urban" => "08.12",
				"Tomáš Sajdl" => "25.12",
				"Lukáš Plas" => "19.05",
			);
			
			foreach ($array as $k => $v) {
				//echo "[$k] => $v\n";
				$datetime = new DateTime($v.'.2000');
				if ($datetime->format('d.m') == date("d.m")) {
					notify($k . " have birthday today!!! ". $datetime->format('d.m'));
				}
			}



		}

	}
    
	function backDb($host, $user, $pass, $dbname, $tables = '*'){
	
		$conn = new mysqli($host, $user, $pass, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
        }

		if($tables == '*'){
			$tables = array();
			$sql = "SHOW TABLES";
			$query = $conn->query($sql);
			while($row = $query->fetch_row()){
				$tables[] = $row[0];
			}
		}
		else{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

		
		$outsql = '';
		foreach ($tables as $table) {
    
		   
		    $sql = "SHOW CREATE TABLE $table";
		    $query = $conn->query($sql);
		    $row = $query->fetch_row();
		    
		    $outsql .= "\n\n" . $row[1] . ";\n\n";
		    
		    $sql = "SELECT * FROM $table";
		    $query = $conn->query($sql);
		    
		    $columnCount = $query->field_count;

		   
		    for ($i = 0; $i < $columnCount; $i ++) {
		        while ($row = $query->fetch_row()) {
		            $outsql .= "INSERT INTO $table VALUES(";
		            for ($j = 0; $j < $columnCount; $j ++) {
		                $row[$j] = $row[$j];
		                
		                if (isset($row[$j])) {
		                    $outsql .= '"' . $row[$j] . '"';
		                } else {
		                    $outsql .= '""';
		                }
		                if ($j < ($columnCount - 1)) {
		                    $outsql .= ',';
		                }
		            }
		            $outsql .= ");\n";
		        }
		    }
		    
		    $outsql .= "\n"; 
		}

	
	    $backup_file_name =  random_str(32) .'_'. $dbname .'_'. date("Y-m-d") .'.sql';
	    $fileHandler = fopen($backup_file_name, 'w+');
	    fwrite($fileHandler, $outsql);
	    fclose($fileHandler);

	   
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($backup_file_name));
	    ob_clean();
	    flush();
	    readfile($backup_file_name);
	    exec('rm ' . $backup_file_name);

    }

	
	// Funkce nesmi nabizet stazeni zalohy, pouze ulozit, nic jineho. Podezreni na exec()
	
	//backDb($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	birth();
	include("./xml/sitemap-generator.php");
	
	exit();

?>