<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/assets/css/fullcalendar.css" />
<link rel="stylesheet" href="/assets/css/matrix-style.css" />
<link rel="stylesheet" href="/assets/css/matrix-media.css" />
<link rel="stylesheet" href="/assets/css/select2.css" />
<link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
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

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard2</a>
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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Management</a> <a href="#" class="current">Comments</a> </div>
    <h1>Comments</h1>
  </div>

  <!-- Articles table -->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Comments</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>comment</th>
                  <th>author</th>
                  <th>article_id</th>
                  <th>operate</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($comments as $comment) { ?>
                <tr class="gradeA">
                  <td><?php echo $comment['content'] ?></td>
                  <td><center><?php echo $comment['nickname'] ?></center></td>
                  <td><center><a href=<?php echo "/articles/edit/".$comment['article_id'] ?> target="_blank"><?php echo $comment['article_id'] ?></a></center></td>
                  <td >
                    <center>
                      <a href="#CommentEdit" data-toggle="modal" class="btn btn-success btn-mini "><i class="icon-edit"></i>Edit</a> 
                      
                      <div id="CommentEdit" class="modal hide">
                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Edit comments</h3>
                        </div>
                        <div class="modal-body">
                          <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                              <h5>Details</h5>
                            </div>
                            <div class="widget-content nopadding">
                              <form action=<?php echo "/comments/update/".$comment['id'] ?>  method="POST" class="form-horizontal">
                                <div class="control-group">
                                  <label class="control-label">Nickname:</label>
                                  <div class="controls">
                                    <input type="text" name="nickname" class="span11" value="<?php echo $comment['nickname'] ?>"/>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">E-mail</label>
                                  <div class="controls">
                                    <input type="email" name="email" class="span11" placeholder="E-mail address"  />
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">Website</label>
                                  <div class="controls">
                                    <input type="text" name="website" class="span11" placeholder="Website name" />
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">Content</label>
                                  <div class="controls">
                                    <textarea class="span11" name="content" ><?php echo $comment['content'] ?></textarea>
                                  </div>
                                </div>
                                <div class="form-actions">
                                  <button type="submit" class="btn btn-success">Save</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>   

                      <form action=<?php echo "/comments/delete/".$comment['id'] ?>  method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger btn-mini"><i class="icon-remove"></i> Delete</button>
                      </form>
                    </center>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
