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
    <h1>Tags1</h1>
  </div>

  <!-- Tass table -->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tags</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>articles</th>
                  <th>tags</th>
                  <th>add</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($articles as $article) { ?>
                <tr class="gradeA">
                  <td><a href=<?php echo "/articles/edit/".$article['id'] ?> target="_blank"><?php echo $article['title'] ?></a></td>
                  <td>
                    <?php foreach ($article['tags'] as $articles_tags) { ?>
                      <form action=<?php echo "/articles_tags/delete/".$articles_tags['id']."&".$article['id'] ?>  method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-mini"><?php echo $articles_tags['tag_name']?></button>
                      </form>
                    <?php } ?>
                  </td>
                  <td><center>
                    <form action=<?php echo "/articles_tags/store" ?>  method="POST">          
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle"><i class="icon-plus"></i>  Add new <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <?php foreach ($article['addlist'] as $item) { ?>
                            <li><a href=<?php echo "/articles_tags/store/".$item['id']."&".$article['id'] ?> ><?php echo $item['tag_name'] ?></a></li>
                          <?php } ?>
                        </ul>
                      </div>           
                    </form>  
                  </center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <hr>      
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tags</h5>
   
            <div style="text-align:right; padding-right:9px; padding-top:3px;">
              <a href="#TagsAdd" data-toggle="modal" class="btn" ><i class="icon-plus"></i> New</a>
            </div>  
            
            <div id="TagsAdd" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Add new</h3>
              </div>
              <div class="modal-body">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Details</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <form action=<?php echo "/tags/add_new_tag" ?>  method="POST" class="form-horizontal">
                      <div class="control-group">
                        <label class="control-label">Tag:</label>
                        <div class="controls">
                          <input type="text" name="tag_name" class="span11" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                          <textarea class="span11" name="tag_desc" ></textarea>
                        </div>
                      </div>
                      <div class="form-actions">
                        <center><button type="submit" class="btn btn-success">Save</button></center>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>tags</th>
                  <th>description</th>
                  <th>updated at</th>
                  <th>op</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tags as $tag) { ?>
                <tr class="gradeA">
                  <td><center><?php echo $tag['tag_name'];?></center></td>
                  <td><center><?php echo $tag['tag_desc'];?></td>
                  <td><center><?php echo $tag['updated_at'];?></td>
                  <td>
                    <center>
                      <form action=<?php echo "/tags/edit/".$tag['id'] ?> method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-success btn-mini"><i class="icon-edit"></i> Edit</button>
                      </form>                            
                      <form action=<?php echo "/tags/delete/".$tag['id'] ?>  method="POST" style="display: inline;">
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
