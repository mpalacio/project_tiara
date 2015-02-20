<div class="page-header">
    <h1>
	<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
	<table class="table table-stripped table-bordered">
	    <thead>
		<tr>
		    <th>#</th>
		    <th>Contestant</th>
	    <?php
		foreach($segment->criterias() AS $criteria)
		{ ?>
		    <th><?php echo $criteria->name; ?></th>
	    <?php
		} ?>
		</tr>
	    </thead>
	    <tbody>
	    <?php
		foreach($segment->contestants() AS $index => $contestant)
		{ ?>
		    <tr>
			<td><?php echo $index + 1; ?></td>
			<td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
		<?php
		    foreach($segment->criterias() AS $criteria)
		    { ?>
			<td><input type="text" class="form-control" /></td>
		<?php 
		    } ?>
		    </tr>
	    <?php
		}
	    ?>
	    </tbody>
	    
	    <tfoot>
		<tr>
		    <td colspan="<?php echo count($segment->criterias()) + 2; ?>">Total: <?php echo count($segment->contestants()); ?></td>
		</tr>
	    </tfoot>
    </div>
</div>
