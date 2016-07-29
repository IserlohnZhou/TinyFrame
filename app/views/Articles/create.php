	<div class="container">  
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Add a new article</div>
	                <div class="panel-body">
	                    <form action="/articles/store" method="POST">
	                        <input type="text" name="title" class="form-control" required="required" placeholder="Input title">
	                        <br>
	                        <textarea name="body" rows="10" class="form-control" required="required" placeholder="Input content"></textarea>
	                       	<script type="text/javascript">CKEDITOR.replace('body');</script>
	                        <br>
	                        <button class="btn btn-lg btn-info">Add new</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div> 

</body>