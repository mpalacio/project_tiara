<div class="page-header">
    <h1 class="clearfix">
	<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
	<?php echo anchor($competition->slug . "/judges/" . $segment->slug . "/scores", "Submit", "id='judge-sheet' class='btn btn-default pull-right'"); ?>
	
    </h1>
</div>
<div class="row">
    <div class="col-md-12">
	<table class="table table-striped table-bordered">
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
		foreach($segment->contestants() AS $segment_contestant)
		{
		    $contestant = $segment_contestant->contestant(); ?>
		    <tr>
			<td><?php echo $index + 1; ?></td>
			<td class="col-md-3"><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
		<?php
		    foreach($segment->criterias() AS $criteria)
		    {
			$criteria_score = $criteria->score($segment_judge->id, $segment_contestant->id); ?>
			<td>
			    <div class="form-group">
				<div class="input-group">
				    <input type="text" class="form-control contestant-criteria-score" placeholder="0.00"
					data-criteria="<?php echo $criteria->id; ?>"
					data-segment-contestant="<?php echo $segment_contestant->id; ?>"
					aria-describedby="percentage-addon"
					value="<?php echo $criteria_score->score; ?>" />
					
				    <span class="input-group-addon hidden-xs" id="percentage-addon">/ <?php echo number_format($criteria->percentage, 0); ?></span>
				</div>
			    </div>
			</td>
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