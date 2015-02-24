            <div class="modal">
                <?php if($modal) echo $modal; ?>
            </div>
        </div> <!--/.container -->
        
        <footer>
            <nav class="navbar navbar-fixed-bottom">
                <div class="container">
                    <p class="navbar-text">Copyright &copy; <?php echo date("Y"); ?> Tiara</p>
                </div>
            </nav>
        </footer>
        
        <script type="text/javascript" src="<?php echo base_url("js/jquery/jquery-1.11.2.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/jquery/jquery.cookie-1.4.1.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/bootstrap/3.3.2/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/moment/2.9.0/moment.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/bootstrap/datetimepicker/4.0.0/bootstrap-datetimepicker.min.js"); ?>"></script>
        
        <script type="text/javascript" id="ajax-csrf">
            $(document).ready(function() {
                $.ajaxSetup({
                    data: {
                        csrf_pt_token: $.cookie('csrf_pt_cookie')
                    }
                })
                
                $('#ajax-csrf').remove()
            })
        </script>
        
        <?php if(is_array($scripts) AND count($scripts))
        {
            foreach($scripts AS $script)
                echo "<script type='text/javascript' src='" . base_url("js/" . $script. ".js") . "'></script>" . PHP_EOL;
        } ?>
        
        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td>
                    <span class="preview"></span>
                </td>
                <td>
                    <p class="name" style="word-break: break-all">{%=file.name%}</p>
                    <strong class="error text-danger"></strong>
                </td>
                <td>
                    <p class="size">Processing...</p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                </td>
                <td>
                    {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-primary btn-block start" disabled>
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start</span>
                        </button>
                    {% } %}
                    {% if (!i) { %}
                        <button class="btn btn-warning btn-block cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>
        
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>
    </body>
</html>