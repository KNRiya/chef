<!DOCTYPE html>
<html>
<link href="style.css"  rel="stylesheet" type="text/css">

<body style="background-color: #faf5ed">

<!--<form action="upload.php" method="post" enctype="multipart/form-data">-->
<!--    Select image to upload:-->
<!--    <input type="file" name="image" id="fileToUpload">-->
<!--    <input type="submit" value="Upload Image" name="submit">-->
<!--</form>-->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="form__group">
        <input type="text" class="form__input" placeholder="Enter Full name" id="name" name="name" required>
        <label for="name" class="form__label">Full name</label>
    </div>
    <div class="form__group">
        <input type="number" class="form__input" placeholder="Enter Experience Year" id="experienceYear" name="experienceYear" required>
        <label for="experienceYear" class="form__label">Experience Year</label>
    </div>
    <div class="form__group">
        <input type="text" class="form__input" placeholder="Enter specialist" id="specalist" name="specalist" required>
        <label for="specalist" class="form__label">specialist</label>
    </div>
    <div class="form__group">
        <input type="number" class="form__input" placeholder="Enter Expected Salary" id="expectedSalary" name="expectedSalary" required>
        <label for="expectedSalary" class="form__label">Expected Salary</label>
    </div>
    <div class="form__group">
        <label for="image" class="form__label">Upload Image</label>
        <input type="file" class="form__input" name="image" id="image" required>


    </div>
    <div class="form__group">
        <button type="submit" class="btn btn--green" name="submit">Submit &rarr;</button>
    </div>
</form>

</body>
</html>