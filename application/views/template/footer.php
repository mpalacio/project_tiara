            <div class="modal">
                <?php if($modal) echo $modal; ?>
            </div>
        </div> <!--/.container -->
        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <p class="navbar-text">Copyright &copy; <?php echo date("Y"); ?> Project Tiara</p>
                </div>
            </nav>
        </footer>
        
        <script type="text/javascript" src="<?php echo base_url("js/jquery/jquery-1.11.2.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/jquery/jquery.cookie-1.4.1.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/bootstrap/3.3.2/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/moment/2.9.0/moment.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/bootstrap/datetimepicker/4.0.0/bootstrap-datetimepicker.min.js"); ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url("js/tiara/main.js"); ?>"></script>
        s
        <?php if(is_array($scripts) AND count($scripts))
        {
            foreach($scripts AS $script)
                echo "<script type='text/javascript' src='" . base_url("js/" . $script. ".js") . "'></script>" . PHP_EOL;
        } ?>
    </body>
</html>