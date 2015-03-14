<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name; ?> <small><?php echo $segment->name ?></small>
</div>

<h4>
    <?php
	$judge = $segment_judge->judge();
	echo  "Judge " . $segment_judge->number . ": ". $judge->first_name . " " . $judge->last_name;
    ?>
</h4>
<div class="row">
    <div class="col-md-12">
	<table class="table table-bordered table-hover">
	    <thead>
		<tr>
		    <th>#</th>
		    <th class="col-xs-3 col-md-3">Contestants</th>
	    <?php
		$segments_ac = $segment->segments_ac();
		
		if(is_array($segments_ac) AND count($segments_ac))
		{
		    foreach($segments_ac AS $segment_ac)
		    {
			if($segment_ac->visibility == 1 OR $segment_ac->visibility == 3)
			{ ?>
		    <th>
			<?php echo ucwords($segment_ac->alias) . "<div>(" . number_format($segment_ac->percentage, 0) . "%)</div>"; ?>
		    </th>    
		    <?php
			}
		    }
		}
		
		$criterias = $segment->criterias();
		
		if(is_array($criterias) AND count($criterias))
		{
		    foreach($criterias AS $segment_criteria)
		    {
			if($segment_criteria->visibility == 1 OR $segment_criteria->visibility == 3)
			{ ?>
		    <th>
			<?php echo $segment_criteria->name . "<div>(" . number_format($segment_criteria->percentage, 0) . "%)</div>"; ?>
		    </th>
		<?php
			}
		    }
		} ?>
		    <th>Total</th>
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
		if(is_array($segments_ac) AND count($segments_ac))
		{
		    foreach($segments_ac AS $segment_ac)
		    {
			if($segment_ac->visibility == 1 OR $segment_ac->visibility == 3)
			{
			    $score_by_segment_ac = $segment_contestant->score_by_segment_ac($segment_ac->id); ?>
			<td class="text-right">
			    <?php echo number_format($score_by_segment_ac, 2); ?>
			</td>
		    <?php    
			    $score = $score + $score_by_segment_ac;
			}
		    }
		}
		
		if(is_array($criterias) AND count($criterias))
		{
		    $score = 0;
		    
		    foreach($criterias AS $segment_criteria)
		    {
			if($segment_criteria->visibility == 1 OR $segment_criteria->visibility == 3)
			{
			    $criteria_score = $segment_criteria->score($segment_judge->id, $segment_contestant->id);
			    $score = $score + $criteria_score->score; ?>
			<td class="text-right"><?php echo ($fill == "score") ? number_format($criteria_score->score, 2) : "&nbsp;"; ?></td>
		<?php
			}
		    }
		} ?>
			<td class="text-right"><?php echo ($fill == "score") ? $score : "&nbsp;"; ?></td>
		    </tr>
		<?php
			
		    }
		} ?>
	    </tbody>
	</table>
    </div>
</div>

<div class="row">
    <div class="col-xs-5 col-md-offset-1 col-md-3 text-center">
	<h4><?php echo $judge->first_name . " " . $judge->last_name; ?></h4>
    </div>
    <div class="col-xs-offset-2 col-xs-5 col-md-offset-4 col-md-3 text-center">
	
    </div>
</div>
<div class="row">
    <div class="col-xs-5 col-md-offset-1 col-md-3 text-center" style="border-top: 1px solid #ccc;">
	Name of Judge
    </div>
    <div class="col-xs-offset-2 col-xs-5 col-md-offset-4 col-md-3 text-center" style="border-top: 1px solid #ccc;">
	Signature of Judge
    </div>
</div>