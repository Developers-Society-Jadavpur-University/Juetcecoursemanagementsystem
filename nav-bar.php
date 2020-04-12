<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="menubar_mobile.css">
</head>
<body>
    <div class="side-nav-bar desktop">
        <ul> 
            <li><a href="../dashboard.php">Dashboard</a></li><br>
            <li><a href="#">Announcements</a></li><br>
            <div class="drop-down">
                <li><a href="../personal_details.php">Profile Update</a></li>
                    <div class="drop-down-content">
                        <ul>
                            <br><li><a href="../personal_details.php">Personal Details</a></li>
                            <li><a href="../parent_details.php">Parent Details</a></li>
                            <li><a href="../address_details.php">Address Details</a></li>
                        </ul>
                    </div>
            </div>
            <br><li><a href="#">Clubs and Societies</a></li><br>
            <li><a href="change-password.php">Change Password</a></li><br>
        </ul>
    </div>
    <div class="nav-bar mobile">    
        <div class="hamburger" id="icon">
            <div class="top"></div>
            <div class="bottom"></div>
        </div>
        <div class="menu" id="menu-mobile">
            <ul> 
                <li><a href="../dashboard.php">Dashboard</a></li><br>
                <li><a href="#">Announcements</a></li><br>
                <div class="drop-down">
                    <li><a href="../personal_details.php">Profile Update</a></li>
                        <div class="drop-down-content">
                            <ul>
                                <br><li><a href="../personal_details.php">Personal Details</a></li>
                                <li><a href="../parent_details.php">Parent Details</a></li>
                                <li><a href="../address_details.php">Address Details</a></li>
                            </ul>
                        </div>
                </div>
                <br><li><a href="#">Clubs and Societies</a></li><br>
                <li><a href="change-password.php">Change Password</a></li><br>
            </ul>
        </div>
    </div>
    <script>
        var menu = document.getElementById("menu-mobile");
        var icon = document.getElementById("icon");
        var body = document.getElementById("body");
        icon.addEventListener("click", myfunction)
        function myfunction(){   
            if( menu.style.display === "inline-block" ){
                menu.style.display = "none";
            }else{
                menu.style.display = "inline-block";
            }
        }
    </script>
</body>
</html>
