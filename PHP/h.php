<?php
function JH($a,$b)
{
	for ($i=0;$i<40;$i++)
	{
		if ($i%2==0)$c.=$a[$i].$b[$i];	
		else $c.=$b[$i].$a[$i];	
	}	
	
	return $c;
}


function DH($c)
{
	for ($i=0;$i<80;$i=$i+2)
	{
		if (($i/2)%2==0)
		{
			$a .= $c[$i];
			$b .= $c[$i+1];	
		}
		else 
		{
			$a .= $c[$i+1];
			$b .= $c[$i];	
	
		}
	}	
	
	return $a."|".$b;
}






function generateTimedHash($data, $salt)
{
    // Salt the token with a defined salt and the time
    return sha1($data . $salt . time());   
}

function verifyTimedHash($token, $data, $salt, $life)
{
    // Get the current time
    $time = time();

    // Verify hash with current time
    if ($token == sha1($data . $salt . $time))
        return true;
       
    // If that didn't work, try verifiying it, each time subtracting 1 from $time, $life times
    for ($offset = 1; $offset <= $life; $offset++)
		//echo $token ."   |    ". sha1($data . $salt . ($time - $offset))."<br>";
        if ($token == sha1($data . $salt . ($time - $offset)))
            return true;
   
    return false;
}

?>