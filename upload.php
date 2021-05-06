<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cheif_information";
$connection = mysqli_connect($servername, $username, $password,
    $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $name = $_POST['name'];
    $experienceYear = $_POST['experienceYear'];
    $specalist = $_POST['specalist'];
    $expectedSalary = $_POST['expectedSalary'];
    $image = $_FILES["image"]["name"];

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>File is not an image.</h1>";

        $uploadOk = 0;
    }

    if (empty($name)) {
        $nameErr = "Name is required";
        $uploadOk = 0;
    } else {
        $name = test_input($name);
        $uploadOk = 1;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $uploadOk = 0;
        }
    }
    if (empty($experienceYear)) {
        $experienceYearErr = "Experience Year is required";
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
        $experienceYear = test_input($experienceYear);

    }
    if (empty($specalist)) {
        $specalistErr = "specalist is required";
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
        $specalist = test_input($specalist);

    }
    if (empty($expectedSalary)) {
        $expectedSalaryErr = "expectedSalary is required";
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
        $expectedSalary = test_input($expectedSalary);

    }
    // Check if file already exists
    if (file_exists($target_file)) {

        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>Sorry, file already exists.</h1>";

        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>Sorry, your file is too large.</h1>";


        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h1>";


        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>Sorry, your file was not uploaded</h1>";

    }


    if ($uploadOk == 1) {

        $sql = "INSERT INTO chefs (name, image,experienceYear,specalist,expectedSalary)
VALUES ('$name','$image','$experienceYear','$specalist','$expectedSalary')";
        if ($connection->query($sql) === TRUE) {

            echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>New record created successfully</h1>";

        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $connection->close();
        echo "hello";
        $target = "uploads/".basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        header("Location:chef.php");
    }
    if ($uploadOk == 0) {
        echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>something goes Wrong</h1>";

    }
} else {
    echo "<h1 style='padding: 100px;text-align: center;margin: 200px;background-color: #faf5ed;color: red;font-weight: bold'>something goes Wrong</h1>";


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

