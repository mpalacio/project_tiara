<nav class="navbar navbar-fixed-top">
    <div class="container">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Tiara</a>
	</div>
	
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <?php echo form_open("", array("class" => "navbar-form navbar-right")); ?>
		<div class="form-group">
		    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
		    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
		</div>
		<button type="submit" class="btn">Login</button>
	    </form>
	</div><!-- /.navbar-collapse -->
    </div>
</nav>