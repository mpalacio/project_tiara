<div class="row">
    <div class="col-md-6">
	<div class="page-header">
	    <h1 class="clearfix sae">
		<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
	    </h1>
	</div>
    </div>
    
    <div class="col-md-6">
	<div class="bs-callout bs-callout-danger">
	    <h4>Heads Up!</h4>

	    <ul>
		<li>All active fields must be filled-up with desired scores.</li>
		<li>The <span class="glyphicon glyphicon-ok text-success"></span> sign indicates that you successfully entered a correct score.</li>
		<li>Else, the <span class="glyphicon glyphicon-remove text-danger"></span> sign indicates that you entered an incorrect score.</li>
	    </ul>
	</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
	<table class="table table-hover table-bordered">
	    <thead>
		<tr>
		    <th>No.</th>
		    <th class="col-md-3">Candidates</th>
		<?php
		    
		    $segments_ac = $segment->segments_ac();
		
		    foreach($segments_ac AS $segment_ac)
		    {
			if($segment_ac->visibility == 1 OR $segment_ac->visibility == 2)
			{ ?>
			<th>
			    <?php echo ucwords($segment_ac->alias) . "<div>(" . number_format($segment_ac->percentage, 0) . "%)</div>"; ?>
			</th>
		<?php
			}
		    }
		
		    $criterias = $segment->criterias();
		
		    foreach($criterias AS $criteria)
		    {
			if($criteria->visibility == 1 OR $criteria->visibility == 2)
			{ ?>
		    <th>
			<?php echo $criteria->name . "<div>(" . number_format($criteria->percentage, 0) . "%)</div>"; ?>
		    </th>
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
		
		foreach($segments_ac AS $segment_ac)
		{
		    if($segment_ac->visibility == 1 OR $segment_ac->visibility == 2)
		    { ?>
		    <td>
		    <?php
			$score_by_segment_ac = $segment_contestant->score_by_segment_ac($segment_ac->id);
			
			$attribute = array(
			    "class" => "form-control text-right contestant-criteria-score",
			    "placeholder" => 0,
			    "aria-describedby" => "percentage-addon",
			    "value" => number_format($score_by_segment_ac, 2),
			    "readonly" => "readonly"
			);
			
			echo form_input($attribute);
			
			$score = $score + $score_by_segment_ac;
		    ?>
		    </td>
	    <?php
		    }
		}
		
		foreach($criterias AS $criteria)
		{
		    if($criteria->visibility == 1 OR $criteria->visibility == 2)
		    {
			$criteria_score = $criteria->score($segment_judge->id, $segment_contestant->id);
			$score = $score + $criteria_score->score; ?>
		    <td>
		    <?php
			if($segment_judge->status)
			{ ?>
			<div class="<?php echo ($criteria_score->score AND $criteria->readonly == 0) ? "form-group has-success" : "form-group"; ?>">
			    <span class="glyphicon" aria-hidden="true"></span>
			    <?php
				$attribute = array(
				    "class" => "form-control text-right contestant-criteria-score" . (($criteria->readonly) ? "" : " input"),
				    "placeholder" => 0,
				    "data-criteria" => $criteria->id,
				    "data-percentage" => $criteria->percentage,
				    "data-segment-contestant" => $segment_contestant->id,
				    "aria-describedby" => "percentage-addon",
				    "value" => ($criteria_score->score) ? number_format($criteria_score->score, 0) : NULL
				);
				
				if($criteria->readonly)
				    $attribute["readonly"] = "readonly";
				    
				echo form_input($attribute);
			    ?>
			</div>
		    </td>
		<?php
			}
			else
			{ ?>
			<p class="form-control-static text-right">
			    <?php echo number_format($criteria_score->score, 0); ?>
			</p>
		<?php
			}
		    }
		} ?>
		    <td>
			<p class="form-control-static text-right contestant-total-score"><?php echo number_format($score, 2); ?></p>
		    </td>
		</tr>
	<?php
	    } ?>
	    </tbody>
	</table>
    </div>
</div>