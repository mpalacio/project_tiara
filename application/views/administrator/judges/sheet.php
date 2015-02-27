<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name; ?> <small><?php echo $segment->name ?></small>
</div>

<h4>
    Judge:
    <u>
	<?php
	    $judge = $segment_judge->judge();
	    echo $judge->last_name . " " . $judge->first_name;
	?>
    </u>
</h4>

<div class="row">
    <div class="col-md-12">
	<table class="table table-bordered table-striped">
	    <thead>
		<tr>
		    <th>#</th>
		    <th class="col-md-3">Contestants</th>
	    <?php
		$segment_criteria_collection = $segment->criterias();
		
		if(is_array($segment_criteria_collection) AND count($segment_criteria_collection))
		{
		    foreach($segment_criteria_collection AS $segment_criteria)
		    { ?>
		    <th><?php echo $segment_criteria->name; ?></th>
		<?php
		    }
		}
	    ?>
		</tr>
	    </thead>
	    <tbody>
		<?php
		$segment_contestant_collection = $segment->contestants();
		
		if(is_array($segment_contestant_collection) AND count($segment_contestant_collection))
		{
		    foreach($segment_contestant_collection AS $segment_contestant)
		    {
			$contestant = $segment_contestant->contestant(); ?>
		    <tr>
			<td></td>
			<td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
	    <?php
		if(is_array($segment_criteria_collection) AND count($segment_criteria_collection))
		{
		    foreach($segment_criteria_collection AS $segment_criteria)
		    {
			$criteria_score = $segment_criteria->score($segment_judge->id, $segment_contestant->id); ?>
		    <td><?php echo ($fill == "score") ? $criteria_score->score : "&nbsp;"; ?></td>
		<?php
		    }
		}
	    ?>
		    </tr>
		<?php
		    }
		} ?>
	    </tbody>
	</table>
    </div>
</div>

<h4>
    Judge:
    <u>
	<?php
	    $judge = $segment_judge->judge();
	    echo $judge->last_name . ", " . $judge->first_name;
	?>
    </u>
</h4>