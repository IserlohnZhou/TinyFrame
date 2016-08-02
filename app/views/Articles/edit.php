	<div class="container">  
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Update an article</div>
	                <div class="panel-body">
	                    <form action=<?php echo "/articles/update/".$article['id'] ?> method="POST" style="display: inline;" enctype="multipart/form-data">	           
	                        <input type="text" name="title" class="form-control" required="required" placeholder="" value="<?php echo $article['title'] ?>" >
	                        <br>
	                        <textarea name="body" rows="10" class="form-control" required="required" placeholder="" ><?php echo $article['body'] ?></textarea>
	                        <script type="text/javascript">CKEDITOR.replace('body');</script>
	                        <br>
	                       	<input type="file" name="file" id="file" />
						    <br>
	                        <button class="btn btn-lg btn-info">Update</button>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div> 
</div>
</body>