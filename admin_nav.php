<?php
if (!isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 'admin_login') {
        header('Location:login.php?err');
    } else {
        echo "<script>
        alert('success');
        </script>";
    }
} 
?> 

<nav class="navbar navbar-expand-sm navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><img src="assets/images/com_logo_trans.png" height="50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="list_app.php"><b><img src="assets/images/dash.png" height="15px"/>Applications</b> <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="add_post.php"><b>+ Add New Job</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="view_posts.php"><b><img src="assets/images/view_user.png" height="15px" /> View Listed Jobs</b> <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="log_out.php"><b><img src="assets/images/log_out.png" height="15px"/>Log Out</b> <span class="sr-only">(current)</span></a>
      </li>
     
     
    </ul>
    
  </div>
</nav>
