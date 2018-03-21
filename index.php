<?php
//Day 12: Digital Plumber By Lehlohonolo Rammego

$arry12 = file('elements.txt', FILE_IGNORE_NEW_LINES);
$arrayGroups = array();

//Get the contents without array indexes
foreach ($arry12 as $inLine)
{
	$splitLines = explode('<->', $inLine);
	array_push($arrayGroups,"$splitLines[1]");
}

//Define A New Array which will contain all groups linked to Program [0]
$ArrElements = array();

//Check if Index 0 exists meaning the array or file is not empty	
if (array_key_exists('0', $arrayGroups)) {
    
	    //We create a string for all all Groups linked to Program [0]
		$line = $arrayGroups[0];
		
		//if the Groups linked to Program[0] are more than 1
		if (strpos($line, ',') !== false)
			{
				//create an array containing all Groups linked to Program[0]
				$varray = explode(',', $line);
				
				//loop through all Groups linked to Program [0]
				foreach($varray as $lin)
				{
					//if our ArrElements has the group, do nothing
					if (in_array($lin, $ArrElements)) {
					}
					//else push the linked group into the array
					else
					{
					array_push($ArrElements, $lin);
					}
				}
			}
			//else if the Groups linked to Program[0] is equal 1
			else
			{
				//if our ArrElements has the group, do nothing
				if (in_array($line, $ArrElements)) {
						
					}
					//else push the linked group into the array
					else
					{
					array_push($ArrElements, $line);
					}
				
			}


	 //loop again and again if the array containing groups linked to program[0] keeps growing
	  do{
		//First Counter to count and increment number of groups linked to program 0 into array  
		$Counter = count($ArrElements);
	
		foreach ($ArrElements as $line2)
		{
			$lnst = preg_replace('/\s+/','',$line2);
			$ln = $arrayGroups[$lnst];
	
			if (strpos($ln, ',') !== false)
			{
				$var = explode(',', $ln);
				foreach($var as $list)
				{
					if (in_array($list, $ArrElements)) {
						continue;
					}
					else
					{
					array_push($ArrElements, $list);
					}
				}
			}
			else
			{
				
				if (in_array($ln, $ArrElements)) {
						continue;
					}
					else
					{
					array_push($ArrElements, $ln);
					}
				
			}
	
		}
		//Brings the total number of groups within program 0 after pushing all other groups
		$NewCounter = count($ArrElements);
		
	     
	}while($NewCounter > $Counter);
	
	$arrFinal = array_unique($ArrElements);
	echo count($arrFinal);
	}

//print_r(array_unique($ArrElements));
?>
