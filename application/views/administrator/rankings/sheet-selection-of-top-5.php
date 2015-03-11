<style>
    @media print {
	@page {
	    size: US-Legal landscape;
	}
	html, body {
	    width: 215.9mm;
	    height: 355.6mm;
	}
	.container {
	    width: 355.6mm;
	}
	table {
	    width: initial !important;
	}
	th, td {
	    font-size: 12px;
	}
	.page {
	    page-break-after: always;
	}
    }
</style>
<?php
    $segment_judges = $segment->judges();
    
    $composites = $segment->composites();
    
    $pages = 1;
    
    $count = count($segment_judges);
    
    $columns = 8; // Number of Judges Per Page
    
    if($count > $columns - 2)
    {
	$c = $count - ($columns - 2);

	if($c > $columns)
	{
	    $remaining = $c % $columns;
	    
	    $pages++;
	    $pages += ($c - $remaining) / $columns;
	}
	else
	{
	    $remaining = $c;
	    $pages++;
	}
    }
    
    $offset = 0;
    
    for($page = 0; $page < $pages; $page++)
    { ?>
<div class="page-header">
    <h1 class="clearfix"><?php echo ($page == 0) ? $competition->name : "&nbsp;"; ?> <small><?php echo ($page == 0) ? $segment->name : "&nbsp;"; ?></small>
</div>

<div class="row page">
    <div class="col-md-12">
	<table class="table table-hover table-condensed table-bordered">
	    <thead>
		<tr>
	    <?php
		if($page == 0) // Print Contestant Number and Name
		{ ?>
		    <th rowspan="2" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">#</th>
		    <th rowspan="2" class="col-xs-5 col-sm-5">Name of Contestants</th>
	    <?php
		}
		if($count > $columns - 2)
		{
		    if($page == 0)
			$limit = $columns - 2;
		    else if($page == $pages - 1)
			$limit = $remaining;
		    else
			$limit = $columns;
		}
		else
		{
		    $limit = $count;
		}
		
		for($j = 0; $j < $limit; $j++)
		{ ?>
		    <th colspan="4">Judge <?php echo $j + $offset + 1; ?></th>
	    <?php
		}
		
		if($page == $pages - 1)
		{ ?>
		    <th rowspan="2">Total Score</th>
		    <th rowspan="2">AVG</th>
		    <th rowspan="2">Final Rank</th>
	    <?php
		} ?>
		</tr>
		
		<tr>
		<?php
		    for($j = 0; $j < $limit; $j++)
		    { ?>
			<td>Int (25%)</td>
			<td>Score (60%)</td>
		<?php
		    foreach($composites AS $composite)
		    { ?>
			<td><?php echo "Talent (" . number_format($composite->percentage, 0) . "%)"; ?></td>
		<?php
		    } ?>
			<td>Total</td>
		<?php
		    } ?>
		</tr>
		<?php
		    
		?>
	    </thead>
	    <tbody>
	    <?php
		$segment_contestants = $segment->contestants();
		foreach($segment_contestants AS $segment_contestant)
		{
		    $total_score = 0.00;
		    $contestant = $segment_contestant->contestant(); ?>
		<tr>
		<?php
		    if($page == 0)
		    { ?>
		    <td><?php echo $segment_contestant->number; ?></td>
		    <td><?php echo htmlentities($contestant->last_name . ", " . $contestant->first_name); ?></td>
		<?php
		    }
		    
		    for($j = 0; $j < $limit; $j++)
		    {
			$segment_judge = $segment_judges[$j + $offset];
			$intelligence = $segment_contestant->criteria_score(11, $segment_judge->id); ?>
			<td class="text-right">
			    <?php echo number_format($intelligence, 2); ?>
			</td>
			
			<td class="text-right">
			    <?php echo number_format($segment_contestant->segment_judge_score($segment_judge->id) - $intelligence, 2); ?>
			</td>
		    <?php
			foreach($composites AS $composite)
			{ ?>
			<td class="text-right">
			    <?php echo number_format($segment_contestant->composite_score($composite->id), 2); ?>
			</td>
		    <?php
			} ?>
			<td class="text-right">
			    <?php $total_score += $segment_contestant->score($segment_judge->id); echo number_format($segment_contestant->score($segment_judge->id), 2); ?>
			</td>
		<?php
		    }
		    
		    if($page == $pages - 1)
		    { ?>
			<td class="text-right"></td>
			<td class="text-right"><?php echo number_format($segment_contestant->average_score(), 2); ?></td>
			<td class="text-right">0</td>
		<?php
		    }
		} ?>
		</tr>
	    </tbody>
	</table>
    </div>
    <div class="col-md-12">
	<div class="row">
	<?php
	    for($j = 0; $j < $limit; $j++)
	    {
		$segment_judge = $segment_judges[$j + $offset];
		$judge = $segment_judge->judge(); ?>
	    <div class="col-xs-3 col-sm-3 col-md-3">
		<h4 class="judge-name-signature"><?php echo htmlentities($judge->first_name . " " . $judge->last_name); ?></h4>
		<h5>Judge <?php echo $j + $offset + 1; ?></h5>
	    </div>
	<?php
	    } ?>
	</div>
    </div>
</div>
<?php
	$offset = $offset + $limit;
    }
?>