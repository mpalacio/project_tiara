        </div>
        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <p class="navbar-text">Copyright &copy; <?php echo date("Y"); ?> Project Tiara</p>
                </div>
            </nav>
        </footer>
        
        <script type="text/javascript" src="<?php echo base_url("js/jquery/jquery-1.11.2.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/bootstrap/3.3.2/bootstrap.min.js"); ?>"></script>
        
        <?php if(is_array($scripts) AND count($scripts))
        {
            foreach($scripts AS $script)
                echo "<script type='text/javascript' src='js/" . base_url($script) . ".js'></script>" . PHP_EOL;
        } ?>
    </body>
</html>