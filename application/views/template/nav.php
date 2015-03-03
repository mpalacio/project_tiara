<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img class="img-responsive" style="width: 38px;" src="<?php echo base_url("images/brand-logo.png"); ?>" /><small style="font-weight: bold;">Tiara</small>
            </a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li class="active"><?php echo anchor("administrator/competitions", "Competitions", "id='competition'"); ?></li>
            </ul>
        </div>
    </div>
</nav>