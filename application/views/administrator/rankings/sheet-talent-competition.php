<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name; ?> <small><?php echo $segment->name ?></small>
</div>
<?php
    $segment_judges = $segment->judges();
    $segment_contestants = $segment->contestants();
?>
<div class="row">
    <div class="col-md-12">
	<table class="table table-hover table-bordered">
	    <thead>
		<tr>
		    <th rowspan="3">#</th>
		    <th rowspan="3" class="col-xs-3 col-sm-3 col-md-3">Contestants</th>
	    <?php
		foreach($segment_judges AS $index => $segment_judge)
		{ ?>
		    <th colspan="2">Judge <?php echo $index + 1; ?></th>
	    <?php
		} ?>
		    <th rowspan="2">Total Points</th>
		    <th rowspan="2">Average</th>
		    <th rowspan="2">15%</th>
		</tr>
		<tr>
	    <?php
		foreach($segment_judges AS $index => $segment_judge)
		{ ?>
		    <td>Total Points</td>
		    <td>Deportment</td>
	    <?php
		} ?>
		</tr>
	    </thead>
	    <tbody>
	    <?php
		foreach($segment_contestants AS $segment_contestant)
		{
		    $total_score = 0.00;
		    
		    $contestant = $segment_contestant->contestant(); ?>
		<tr>
		    <td><?php echo $segment_contestant->number; ?></td>
		    <td><?php echo htmlentities($contestant->last_name . ", " . $contestant->first_name); ?></td>
		<?php
		    foreach($segment_judges AS $index => $segment_judge)
		    {
			$score = $segment_contestant->score($segment_judge->id);
			
			$total_score = $total_score + $score;
			
			$deportment = $segment_contestant->criteria_score(10, $segment_judge->id); ?>
		    <td class="text-right"><?php echo $score - $deportment; ?></td>
		    <td class="text-right"><?php echo number_format($deportment, 2); ?></td>
		<?php
		    } ?>
		    <td class="text-right"><?php echo number_format($total_score, 2); ?></td>
		    <td class="text-right"><?php echo number_format($total_score / count($segment_judges), 2); ?></td>
		    <td class="text-right"><?php echo number_format(($total_score / count($segment_judges)) * 0.15, 2); ?></td>
		</tr>
	    <?php
		} ?>
	    </tbody>
	</table>
    </div>
</div>
<div class="row">
<?php
    foreach($segment_judges AS $index => $segment_judge)
    {
	$judge = $segment_judge->judge(); ?>
    <div class="col-md-3 col-xs-3">
	<h4 class="judge-name-signature"><?php echo $judge->last_name . ", " . $judge->first_name; ?></h4>
	<h5>Judge <?php echo $index + 1; ?></h5>
    </div>
<?php
    } ?>
</div>