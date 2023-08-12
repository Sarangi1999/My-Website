
//usage of function validateForm() function

function validateForm($name, $email, $message)
{
	$errors = array();

if (empty($name))  //validate Name
{
	$errors[] = "Name is required";
}
elseif(!preg_match("/^[a-z A-Z]*$/", $name))
{
	$errors[]= "Name can only contain letters and spaces";
}


if (empty($email))  //validate Email
{
	$errors[] = "Email is required";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$errors[]= "Invalid email format";
}

if (empty($message))  //validate Email
{
	$errors[] = "Message is required";
}

return $errors;
}


//usage of function connectDatabase() function

function connectDatabase()
{
	$host = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "your_database";

$conn = newmysqli($host, $username, $password, $dbname);

if($conn->connect_error)
{
	die("Connection failed:" .$conn->connect_error);
}

return $conn;
}


//usage of insertProject() function	

function insertProject($projectName, $projectDescription, $projectStatus) 
{
	$servername = "your_servername";
	$username = "your_username";
	$password = "your_password";
	$dbname = "your_dbname";

	$conn = new mysqli($servername, $username, $password, $dbname);

    
	if ($conn->connect_error) 
	{
        	die("Connection failed: " . $conn->connect_error);
    	}

        $sql = "INSERT INTO projects (name, description, status) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sss", $projectName, $projectDescription, $projectStatus);

	if ($stmt->execute()) {
        echo "Project details inserted successfully.";
	} 
	else 
	{
        echo "Error inserting project details: ";
	}
}


//usage of getProject() function

function getProjects() 
{
	$host = "localhost";
	$username = "your_username";
	$password = "your_password";
	$database = "your_database";

	$conn = mysqli_connect($host, $username, $password, $database);

	if (!$conn) 
	{
        	die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM projects";

	$result = mysqli_query($conn, $query);

	if ($result) 
	{
        	$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);	
		mysqli_close($conn);
	} 
	else 
	{
	echo "Error retrieving projects: ";
	}

	return $projects;
}


// usage of updateProject() function

function updateProject($projectId, $newTitle, $newDescription, $newStatus) {
    // Assuming you have a database connection established
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_dbname";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute update query
    $sql = "UPDATE projects SET title=?, description=?, status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute
    $stmt->bind_param("sssi", $newTitle, $newDescription, $newStatus, $projectId);
    $result = $stmt->execute();

    // Check if update was successful
    if ($result === TRUE) {
        echo "Project updated successfully.";
    } else {
        echo "Error updating project: " . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
