<?php
include 'conn.php';

			$fileName = $_FILES["file"]["name"];
			$fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';
            $amount='0';
			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$bookname = $row[0];
				$catagory = $row[1];
				$author = $row[2];
				$grade = $row[3];
				$shelfNumber = $row[4];
				$pub_date1 = $row[5];
				 $date=explode('-',$pub_date1);
                $day=$date[2];
                $month=$date[1];
                $year=$date[0];
                $pub_date=$day.$month.$year;
				
				$quantity = $row[6];
				$fixedQuan = $row[6];
				$freq = '0';
                
				mysqli_query($con, "INSERT INTO book(TITLE,CATAGORY,AUTHOR,GRADE_LEVEL,SHELF_NUMBER,PUB_DATE,QUANTITY,FIXED_QUANTITY,FREQUENCY)
                                    VALUES('$bookname','$catagory','$author','$grade','$shelfNumber','$pub_date',$quantity,$fixedQuan,'$freq')");
                $amount++;
            }

			echo" $amount Books Imported Successfully...";
			
			
		

        ?>

