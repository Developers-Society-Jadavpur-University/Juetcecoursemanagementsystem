<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css">

</head>
<body>
    <?php
    require "prevent_login.php";

    ?>
   
    <ul class="header" style="background-color: orange;" >
        


        <li><div class="dropdown">
           <button id="prof_menu" onclick="dropdownfunction_academic()" class="dropbtn">Academic Action &nbsp;
           <i onclick="dropdownfunction_academic()" class="arrow down-arrow"></i></button>
          <div id="myDropdown_academic" class="dropdown-content myDropdown">
           <a href="../admindashboard.php">Batch Info</a>

           <a href="../admin_dashboard/admin-subinfopage.php">Subject Info</a>
           
          
          </div>
         </div>
        </li>
        
        <li><div class="dropdown">
           <button id="prof_menu" onclick="dropdownfunction()" class="dropbtn">Notice Update &nbsp;
           <i onclick="dropdownfunction()" class="arrow down-arrow"></i></button>
          <div id="myDropdown" class="dropdown-content myDropdown">
           <a href="../admin_dashboard/issue_new_notice_admin.php?task=issue">Issue New Notice</a>

           <a href="../admin_dashboard/issued-notice_admin.php">Issued Notice</a>
           <a href="../admin_dashboard/archived-notice_admin.php">Archived Notice</a>
          
          </div>
         </div>
        </li>
        <li><div class="dropdown">
           <button id="prof_menu" onclick="dropdownfunction_users()" class="dropbtn">User Action &nbsp;
           <i onclick="dropdownfunction_users()" class="arrow down-arrow"></i></button>
          <div id="myDropdown_users" class="dropdown-content myDropdown">
           <a href="#">Create Faculty</a>

           
          
          </div>
         </div>
        </li>
        
        
    </ul>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropdownfunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
function dropdownfunction_academic() {
  document.getElementById("myDropdown_academic").classList.toggle("show");
}
function dropdownfunction_users() {
  document.getElementById("myDropdown_users").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('#prof_menu')) {
    var dropdowns = document.getElementsByClassName("myDropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
// window.onclick = function(event) {
//   if (!event.target.matches('#sem_menu')) {
//     var dropdowns = document.getElementsByClassName("myDropdown_semester");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
// window.onclick = function(event) {
//   if (!event.target.matches('#notice_menu')) {
//     var dropdowns = document.getElementsByClassName("myDropdown_notice");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }


</script>  
</body>

</html>