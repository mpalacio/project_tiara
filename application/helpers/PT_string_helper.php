<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * Insert Ordinal Suffix
 *
 * Inserts ordinal suffix from a string:
 *
 * 12
 *
 * becomes:
 *
 * 12th
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists("ordinal_suffix"))
{
    function ordinal_suffix($number)
    {
	if(ctype_digit($number) == FALSE AND is_numeric($number) == FALSE)
	    return NULL;
	
	$tenth = $number % 10;
	$hundreth = $number % 100;
	    
	if ($tenth == 1 && $hundreth != 11)
	    return $number . "st";
	
	if ($tenth == 2 && $hundreth != 12)
	    return $number . "nd";
	
	if ($tenth == 3 && $hundreth != 13)
	    return $number . "rd";
	
	return $number . "th";
    }
}