<?php
 /*
	//Create connection to current Contact table
	require $_SERVER["DOCUMENT_ROOT"]."/SocialContact/class/Contact_Map.php";
	
	//Create object Contact_Map
	$contact = new Contact_Map;
	
	//return new connection to this database
	$conn = $contact->openDBConnection();
	
	//Create query
	$query = 'UPDATE contacts_bak JOIN contacts
		SET contacts_bak.id = contacts.id,
        contacts_bak.name = contacts.name,
		contacts_bak.birthday = contacts.birthday, 
		contacts_bak.contactCode = contacts.contactCode,
		contacts_bak.targetDate = contacts.targetDate,	
		contacts_bak.description = contacts.description;';
	/* 
		UPDATE contacts-bak
	            JOIN contacts c ON c.id = contacts-bak.id
				SET contacts-bak.id = c.id,
				contacts-bak.name = c.name,
				contacts-bak.birthday = c.birthday,
				contacts-bak.contactCode = c.contactCode,
				contacts-bak.targetDate = c.targetDate,
				contacts-bak.description = c.description
	
	*/
	/*
	//Fetch result
	$result = mysqli_query($conn, $query);
	
	//fetch the results
	$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
		   
    //close connection
	mysqli_close($conn);
	
	//close page
	echo '<script type="text/javascript">window.close();</script>';
	
	echo print_r($entries);
	
	*/
	//set default date and time
	date_default_timezone_set('America/New_York');
	
	
	//ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "61RandolphDrive";
    $mysqlHostName      = "localhost";
    $DbName             = "fantasyfootballnotebook";
    $backup_name        = "mybackup_".date('d-m-Y').".sql";
    $tables             = "players";

   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name."_".date('m-d-Y').".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        
        //close page via javascript
	    echo '<script type="text/javascript">window.close();</script>';  		
        echo $content; exit;
		
    }
?>