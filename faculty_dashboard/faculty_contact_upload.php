<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Faculty Contact Update</title>
</head>
<body>
    <?php 
        require "../header.php";
       // require "prevent_login.php";
     //   require "includes/dbh.inc.php";
        
    ?>
    <div class="container">
        <h3 class="heading">Please Upload your Contact and Bio </h3>
            <section class="entry" >
                <form action="../includes/faculty_contact_upload.inc.php" method="post" enctype="multipart/form-data" >
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" placeholder="Your Name"> <br> <br> <br>
                     <label for="email">Email</label>
                     <input type="email" name="email" id="email" placeholder="Your Email Id"> <br> <br> <br>
                     <label for="mobile">Mobile Number</label>
                     <input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number"> <br> <br> <br>
                     <label for="office">Office</label>
                     <input type="text" name="office" id="office" placeholder="Office"> <br> <br> <br>
                     <label for="phone">Phone</label>
                     <input type="text" name="phone" id="phone" placeholder="Tele-Phone Number"> <br> <br> <br>
                     <label for="website">Website</label>
                     <input type="text" name="website" id="website" placeholder="Your Website"> <br> <br> <br>
                     <label for="photo">Upload Your Image:</label>
                     <input type="file" name="picture" id="photo"> <br> <br> <br>
                     Bio : <br> <textarea name="bio" id="bio" cols="50" rows="8" placeholder="Write something about you" ></textarea> <br><br> <br>                   
                     Current Research Work: <br>  <textarea name="research" id="research" cols="50" rows="8" placeholder="Please write something current work" ></textarea> <br><br> <br>
                     <label for="research"></label>

                     <button class="submit-buttons" type="submit" name="facultycontact-submit">Submit Your Details</button>

                </form>
    </div>
    <?php require "../footer.php"; ?>
</body>
</html>