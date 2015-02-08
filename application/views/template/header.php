<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    
        <link rel="stylesheet" href="<?php echo base_url("css/bootstrap/3.3.2/bootstrap.min.css"); ?>" />
        
        <?php if(is_array($styles) AND count($styles))
        {
            foreach($styles AS $style)
                echo "<link rel='stylesheet' href='css/" . base_url($style) . ".css' />" . PHP_EOL;
        } ?>
    </head>
    <body>
        <?php echo $nav; ?>
        
        <div class="container">
            
        