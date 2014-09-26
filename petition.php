<?php
// The MIT License (MIT)
// 
// Copyright (c) 2014 Brent Saltzman
// 
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
// 
// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.


//Include Simple HTML DOM Parser Library
//More information can be found at http://simplehtmldom.sourceforge.net/

include_once "simple_html_dom.php"; 



//Get Petition ID from URL. The assumption is made that the ID is valid from iPetition's widget URL.

$pid = htmlspecialchars($_GET["pid"]);

//Check parameter value to ensure is indeed a number, if not, end.
if (is_numeric($pid)) 
		{
    	//If the parameter was valid, attempt to get petition signatures and create XML
    	
		// Dump contents (without tags) from HTML Widget
		$string = file_get_html('http://www.ipetitions.com/widget/view/blue/'. $pid)->plaintext; 
		
		//Get the actual number from widget text
		$sigs = preg_replace("/[^0-9]/","",$string);
		
		//Output the number in XML so it can be used elsewhere
		header('Content-Type: text/xml');
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
		echo '<petition>';
			echo'<signatures>';
				echo htmlspecialchars($sigs);
			echo'</signatures>';
		echo '</petition>';

    } 
    else
     {
        die("$pid is not a valid number.");
    }

?>