<div class="page-header">
    <h1 class="clearfix sae">
	<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
    </h1>
</div>
<div class="row">
    <div class="col-md-12">
	<table class="table table-hover table-bordered">
	    <thead>
		<tr>
		    <th>No.</th>
		    <th class="col-md-3">Candidates</th>
		<?php
		    foreach($segment->criterias() AS $criteria)
		    {
			if($criteria->visibility == 1 OR $criteria->visibility == 2)
			{ ?>
		    <th><?php echo $criteria->name . " (" . number_format($criteria->percentage, 0) . "%)"; ?></th>
		<?php
			}
		    } ?>
		    <th>Total</th>
		</tr>
	    </thead>
	    <tbody>
	<?php
	    foreach($segment->contestants() AS $segment_contestant)
	    {
		$contestant = $segment_contestant->contestant(); ?>
		<tr>
		    <td><?php echo $segment_contestant->number; ?></td>
		    <td><?php echo $contestant->last_name . ", " . $contestant->first_name; ?></td>
	    <?php
		$score = 0;
		
		foreach($segment->criterias() AS $criteria)
		{
		    if($criteria->visibility == 1 OR $criteria->visibility == 2)
		    {
			$criteria_score = $criteria->score($segment_judge->id, $segment_contestant->id);
			$score = $score + $criteria_score->score; ?>
		    <td>
		    <?php
			if($segment_judge->status)
			{ ?>
			<div class="<?php echo ($criteria_score->score) ? "form-group has-success" : "form-group"; ?>">
			    <span class="glyphicon" aria-hidden="true"></span>
			    <input type="text" class="form-control text-right contestant-criteria-score" placeholder="0" data-criteria="<?php echo $criteria->id; ?>" data-percentage="<?php echo $criteria->percentage; ?>" data-segment-contestant="<?php echo $segment_contestant->id; ?>" aria-describedby="percentage-addon" value="<?php echo $criteria_score->score; ?>" />
			</div>
		    </td>
		<?php
			}
			else
			{ ?>
			<p class="form-control-static text-right"><?php echo number_format($criteria_score->score, 0); ?></p>
		<?php
			}
		    }
		} ?>
		    <td><p class="form-control-static text-right contestant-total-score"><?php echo number_format($score, 0); ?></p></td>
		</tr>
	<?php
	    } ?>
	    </tbody>
	</table>
    </div>
</div>