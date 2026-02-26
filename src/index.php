<HTML>

<TITLE>NFC Photo</TITLE>

<BODY>

<H1>NFC Photo</H1>

<?php
$servername = "localhost";
$username = "nfcphotouser";
$password = "nfcphotopassword";
$dbname = "nfcphotodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "<P>Connected successfully</P>";

$sqlCreateTableIfNotExists = "create table if not exists Entries(id VARCHAR(255) PRIMARY KEY, detail VARCHAR(1000) NOT NULL);";
$createTable=mysqli_query($conn, $sqlCreateTableIfNotExists);
if( $createTable )
{
	//echo "<P>Created Table</P>";
}
else
{
	echo "<P>No table created</P>";
}

if ( isset($_REQUEST) )
{
	$photoid = $_REQUEST['photoid'];

	if( isset($photoid) )
	{
		//echo "<P>Photo: photoid is set :)<BR> " . $photoid . "</P>";
		$sqlSelect = "SELECT detail FROM Entries WHERE id = '" . $photoid . "';";

                if( $result = mysqli_query($conn, $sqlSelect) )
		{
			//echo "<P>Query successful</P>";
			if ($row = mysqli_fetch_assoc($result)) {
				//echo "<P>Fetch successful</P>";
			        echo "<P>Details: " . $row['detail'] . "<P>";
		        } else {
                          echo "No record found for ID: " . $id;
                        }
		}
		else
		{
			echo "Issues with query";
		}

	}
	else
	{
           echo "NFC Photo.  If you have a photo to get detail use the site like nfcphoto.place.com/?photoiid=Whatever  Have fun!";
        }
}
else
{
	echo "NFC Photo.  If you have a photo to get detail use the site like nfcphoto.place.com/?photoiid=Whatever  Have fun!";
}

$conn->close();
?>

<form action="index.php" method="post">
<p>
                <label for="photoid">Photo ID:</label>
                <input type="text" name="photoid" id="photoid">
</p>

            <input type="submit" value="Submit">
</form>

</BODY>
</HTML>
