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
		    <th rowspan="2">#</th>
		    <th rowspan="2">Contestants</th>
	    <?php
		foreach($segment_judges AS $index => $segment_judge)
		{ ?>
		    <th colspan="2">Judge <?php echo $index + 1; ?></th>
	    <?php
		} ?>
		    <th rowspan="2">Total Rank</th>
		    <th rowspan="2">Final Rank</th>
		</tr>
		<tr>
	    <?php
		foreach($segment_judges AS $index => $segment_judge)
		{ ?>
		    <td>Score</td>
		    <td>Rank</td>
	    <?php
		} ?>
		</tr>
	    </thead>
	    <tbody>
	    <?php
		foreach($segment_contestants AS $segment_contestant)
		{
		    $contestant = $segment_contestant->contestant(); ?>
		<tr>
		    <td><?php echo $segment_contestant->number; ?></td>
		    <td><?php echo $contestant->last_name . ", " . $contestant->first_name; ?></td>
		<?php
		    foreach($segment_judges AS $index => $segment_judge)
		    { ?>
		    <td class="text-right"><?php echo $segment_contestant->score($segment_judge->id); ?></td>
		    <td class="text-right"><?php echo $segment_contestant->rank($segment_judge->id); ?></td>
		<?php
		    } ?>
		    <td class="text-right"><?php echo $segment_contestant->total_rank(); ?></td>
		    <td class="text-right"><?php echo $segment_contestant->final_rank(); ?></td>
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