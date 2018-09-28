
<?php
header('Content-Type: application/json');
$database = "phone";        # Get these database details from
$hostname = "localhost";    # the web console
$user     = "user";     #
$password = "password";   #
$port     = 50000;          #
$ssl_port = 50001;          #

# Build the connection string
#
$driver  = "DRIVER={IBM DB2 ODBC DRIVER};";
$dsn     = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;";
$ssl_dsn = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$ssl_port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;" .
           "SECURITY=SSL;";
$conn_string = $driver . $dsn;     # Non-SSL
//$conn_string = $driver . $ssl_dsn; # SSL

# Connect
#
$conn = odbc_connect( $conn_string, "", "" );

 if (!($conn)) {
 	echo "<p>Connection to DB via ODBC failed: ";
 	echo odbc_errormsg ($conn );
 	echo "</p>\n";
 }

$sql = "SELECT * FROM users";
$rs = odbc_exec($conn, $sql);

$str = '[';
while (odbc_fetch_row($rs))
{
	//$str .= odbc_result_all($rs);
	$str .= '{ "id":'. odbc_result($rs,"id") . 
                ', "name":"' .  odbc_result($rs,"name") . 
                '","phone":"' .  odbc_result($rs,"telephone"). '"},';
}


$str = substr($str,0,-1);
$str .= ']';
echo $str;

odbc_close($conn);
 


 ?>