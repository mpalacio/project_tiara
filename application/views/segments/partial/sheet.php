<div class="page-header">
    <h1 class="clearfix">
	<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
	<?php echo anchor($competition->slug . "/judges/" . $segment->slug . "/scores", "Submit", "id='judge-sheet' class='btn btn-default pull-right'"); ?>
    </h1>
</div>

<div class="row">
<?php
    foreach($segment->contestants() AS $segment_contestant)
    {
	$contestant = $segment_contestant->contestant(); ?>
	
    <div class="col-md-12">
	<div class="panel panel-default panel-contestant">
	    <div class="panel-body">
		<div class="row">
		    <div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="<?php echo base_url($contestant->image); ?>" />
		    </div>

		    <div class="col-md-9">
			<div class="row">
			    <div class="col-md-12">
				<h2 class="contestant-name"><span class="label label-default"><?php echo $segment_contestant->number; ?></span> <?php echo $contestant->first_name . " " . $contestant->last_name; ?></h2>
				
				<div class="row">
				    <div class="col-md-3 col-xs-6">
					<div class="form-group">
					    <label class="control-label">Vital Statistics</label>
					    <p class="form-control-static">
						<?php
						    $bhw = explode('-', $contestant->BHW);
						    
						    echo "<span class='label label-default'>B</span> " . $bhw[0] . " <span class='label label-default'>H</span> " . $bhw[1] . " <span class='label label-default'>W</span> " . $bhw[2];
						?>
					    </p>	
					</div>
				    </div>
				    
				    <div class="col-md-3 col-xs-6">
					<div class="form-group">
					    <label class="control-label">Age</label>
					    <p class="form-control-static"><?php echo date_diff(date_create($contestant->birthday), date_create("today"))->y; ?> years old</p>	
					</div>
				    </div>
				    
				    <div class="col-md-3 col-xs-6">
					<div class="form-group">
					    <label class="control-label">Height</label>
					    <p class="form-control-static"><?php echo $contestant->height; ?></p>	
					</div>
				    </div>
				    
				    <div class="col-md-3 col-xs-6">
					<div class="form-group">
					    <label class="control-label">Weight</label>
					    <p class="form-control-static"><?php echo $contestant->weight; ?> kg</p>	
					</div>
				    </div>
				    
				    
				</div>
			    </div>
			</div>
		
			<div class="row">
			    <div class="col-md-12">
				<h3 class="scoring-sheet">Scoring Sheet</h3>
				
				<div class="row">
				<?php
				    foreach($segment->criterias() AS $criteria)
				    {
					$criteria_score = $criteria->score($segment_judge->id, $segment_contestant->id); ?>
					
				    <div class="col-md-3 col-xs-6">
					<div class="form-group">
					    <label for="inputEmail3" class="control-label"><?php echo $criteria->name; ?></label>
					    
					    <div class="input-group">
						<input type="text" class="form-control contestant-criteria-score" placeholder="0.00" data-criteria="<?php echo $criteria->id; ?>" data-segment-contestant="<?php echo $segment_contestant->id; ?>" aria-describedby="percentage-addon" value="<?php echo $criteria_score->score; ?>" />
						<span class="input-group-addon" id="percentage-addon" data-percentage="<?php echo $criteria->percentage; ?>">/ <?php echo number_format($criteria->percentage, 0); ?></span>
					    </div>
					</div>
				    </div>
				<?php
				    }
				?>
				</div>
				
			    </div>
			</div>
		    </div>

		</div>
	    </div>
	</div>
    </div>
<?php
    }
?>
</div>