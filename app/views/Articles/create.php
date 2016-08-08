<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/assets/css/colorpicker.css" />
<link rel="stylesheet" href="/assets/css/datepicker.css" />
<link rel="stylesheet" href="/assets/css/uniform.css" />
<link rel="stylesheet" href="/assets/css/fullcalendar.css" />
<link rel="stylesheet" href="/assets/css/matrix-style.css" />
<link rel="stylesheet" href="/assets/css/matrix-media.css" />
<link rel="stylesheet" href="/assets/css/select2.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-wysihtml5.css" />
<link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body >

<!--Header-part-->
<div id="header" >
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse" >
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo $_SESSION['username'] ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="/login/logout"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="/login/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--sidebar-menu-->

<div id="sidebar" ><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard2</a>
  <ul>
    <li ><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu active"> <a href="#"><i class="icon icon-th-list"></i> <span>management</span></a>
      <ul>
        <li><a href="/articles">Articles</a></li>
        <li><a href="/comments">Comments</a></li>
        <li><a href="/tags">Tags</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>balabala</span></a></li>

  </ul>
</div>
<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Management</a> <a href="#" class="current">Articles</a> </div>
    <h1>Articles</h1>
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Post</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
            <form action=<?php echo "/articles/store" ?> method="POST" enctype="multipart/form-data">   
              <div class="controls">
                <input type="text" name="title" class="span12" required="required" placeholder="" >
                <br>
                <textarea name="body" rows="10" class="textarea_editor span12"  placeholder="" ></textarea>
                <br>
                <label class="control-label" style="display: inline;">File upload input</label>
                <input type="file" name="file" id="file" />
                <br>
                <button class="btn btn-lg btn-info">Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="/assets/js/excanvas.min.js"></script> 
<script src="/assets/js/jquery.min.js"></script> 
<script src="/assets/js/jquery.ui.custom.js"></script> 
<script src="/assets/js/bootstrap.min.js"></script> 
<script src="/assets/js/jquery.flot.min.js"></script> 
<script src="/assets/js/jquery.flot.resize.min.js"></script> 
<script src="/assets/js/jquery.peity.min.js"></script> 
<script src="/assets/js/matrix.js"></script> 
<script src="/assets/js/fullcalendar.min.js"></script> 
<script src="/assets/js/matrix.calendar.js"></script> 
<script src="/assets/js/matrix.chat.js"></script> 
<script src="/assets/js/jquery.validate.js"></script> 
<script src="/assets/js/matrix.form_validation.js"></script> 
<script src="/assets/js/jquery.wizard.js"></script> 
<script src="/assets/js/jquery.uniform.js"></script> 
<script src="/assets/js/select2.min.js"></script> 
<script src="/assets/js/matrix.popover.js"></script> 
<script src="/assets/js/jquery.dataTables.min.js"></script> 
<script src="/assets/js/matrix.tables.js"></script> 
<script src="/assets/js/matrix.interface.js"></script> 
<script src="/assets/js/matrix.form_common.js"></script> 
<script src="/assets/js/wysihtml5-0.3.0.js"></script> 
<script src="/assets/js/jquery.peity.min.js"></script> 
<script src="/assets/js/bootstrap-wysihtml5.js"></script> 
<script src="/assets/js/bootstrap-colorpicker.js"></script> 
<script src="/assets/js/bootstrap-datepicker.js"></script> 
<script src="/assets/js/jquery.toggle.buttons.html"></script> 
<script src="/assets/js/masked.js"></script> 
<script src="/assets/js/jquery.uniform.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>
</html>
