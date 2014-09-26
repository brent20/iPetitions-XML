# About iPetitions-XML

This PHP script allows you to pull the number of signatures from an  [iPetitions](http://www.ipetitions.com/) Petition into valid XML to be used in a variety of ways. <BR><BR>Because iPetitions does not have an open API there is no way to programmatically access the number of signatures so it can be used elsewhere in your project or campaign. The use case for this is to dynamically incorporate the number of signatures into an existing layout and have control over formatting, layout, and color. 
<BR><BR>The script relies on iPetition's Widget which allows you to embed the signature number and button as an iFrame on a website.<BR>
To use this script place it and the simple_html_dom library on a web server with PHP and use the pid parameter to set your Petition's ID. <BR>You can find this ID number from the Widget embed page on your iPetition site. (for example: http://www.ipetitions.com/widget/view/650884, the ID is 650884)
<BR><BR>The assumption will be made that you are using a valid ID number from iPetitions.
<BR><BR><BR>
This script is not affiliated with iPetitions and can stop working at anytime.