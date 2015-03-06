<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name; ?> <small><?php echo $segment->name ?></small>
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
<div class="row">
    <div class="col-md-12">
	<table class="table table-bordered table-striped">
	    <thead>
		<tr>
		    <th>#</th>
		    <th class="col-md-3"><div class="s">Contestants</div></th>
	    <?php
		$segment_criterias = $segment->criterias();
		
		if(is_array($segment_criterias) AND count($segment_criterias))
		{
		    foreach($segment_criterias AS $segment_criteria)
		    { ?>
		    <th><div class="s"><?php echo $segment_criteria->name; ?></div></th>
		<?php
		    }
		}
		?>
			<th>Total</th>
			<th>Rank</th>
		</tr>
	    </thead>
	    <tbody>
		<?php
		$segment_contestants = $segment->contestants();
		
		if(is_array($segment_contestants) AND count($segment_contestants))
		{
		    foreach($segment_contestants AS $segment_contestant)
		    {
			$contestant = $segment_contestant->contestant(); ?>
		    <tr>
			<td><?php echo $segment_contestant->number; ?></td>
			<td><div class="s"><?php echo htmlentities($contestant->first_name . " " . $contestant->last_name); ?></div></td>
	    <?php
		if(is_array($segment_criterias) AND count($segment_criterias))
		{
		    foreach($segment_criterias AS $segment_criteria)
		    {
			$criteria_score = $segment_criteria->score($segment_judge->id, $segment_contestant->id); ?>
		    <td class="text-right"><?php echo ($fill == "score") ? $criteria_score->score : "&nbsp;"; ?> / <?php echo number_format($segment_criteria->percentage, 0); ?></td>
		<?php
		    }
		}
	    ?>
			<td><?php echo $segment_contestant->score($segment_judge->id); ?></td>
			<td><?php echo $segment_contestant->rank($segment_judge->id); ?></td>
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