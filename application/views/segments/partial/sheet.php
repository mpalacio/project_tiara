<div class="page-header">
    <h1 class="clearfix sae">
	<?php echo anchor($competition->slug . "/judges", $competition->name); ?> <small><?php echo $segment->name; ?></small>
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
	<h3 class="candidates">The Candidates</h3>
	
	<div role="tabpanel">
	    <ul class="nav nav-tabs nav-justified" role="tablist" style="margin-bottom: 15px;">
	<?php
	    $segment_contestants = $segment->contestants();
	
	    foreach($segment_contestants AS $segment_contestant)
	    {
		$contestant = $segment_contestant->contestant(); 
		
		echo ($segment_contestant->number == 1) ? "<li role='presentation' class='active'>" : "<li role='presentation'>"; ?>
		    <a href="#candidate-<?php echo $segment_contestant->number; ?>" aria-controls="candidate-<?php echo $segment_contestant->number; ?>" role="tab" data-toggle="tab"><?php echo $segment_contestant->number; ?></a>
		</li>
	<?php
	    } ?>
	    </ul>
	
	
	    <div class="tab-content">
    <?php
	foreach($segment_contestants AS $segment_contestant)
	{
	    $contestant = $segment_contestant->contestant(); 
	    
	    echo ($segment_contestant->number == 1) ? "<div role='tabpanel' class='tab-pane fade in active' id='candidate-" . $segment_contestant->number . "'>" : "<div role='tabpanel' class='tab-pane fade' id='candidate-" . $segment_contestant->number . "'>"; ?>
		
		<div class="row">
		    <div class="col-md-12">
			<div class="panel panel-default panel-contestant">
			    <div class="panel-body">
				<div class="row">
				    <div class="col-md-3">
					<img class="img-responsive img-thumbnail" src="<?php echo base_url($contestant->image); ?>" />
				    </div>
				    <div class="col-md-5">
					<h2 class="contestant-name"><span class="label label-default"><?php echo $segment_contestant->number; ?></span> <?php echo $contestant->first_name . " " . $contestant->last_name; ?></h2>
				    
					<form class="form-horizontal">
					    <div class="form-group">
						<label class="col-md-4 control-label">Vital Statistics</label>
						<div class="col-md-8">
						    <p class="form-control-static"><?php
							$bhw = explode('-', $contestant->BHW);
							
							echo "<span class='label label-default'>B</span> " . $bhw[0] . " <span class='label label-default'>H</span> " . $bhw[1] . " <span class='label label-default'>W</span> " . $bhw[2]; ?>
						    </p>
						</div>
					    </div>
					    
					    <div class="form-group">
						<label class="col-md-4 control-label">Age</label>
						<div class="col-md-8">
						    <p class="form-control-static">
							<?php echo date_diff(date_create($contestant->birthday), date_create("today"))->y; ?> years old
						    </p>
						</div>
					    </div>

					    <div class="form-group">
						<label class="col-md-4 control-label">Height</label>
						<div class="col-md-8">
						    <p class="form-control-static">
							<?php echo $contestant->height; ?>
						    </p>
						</div>
					    </div>
					    
					    <div class="form-group">
						<label class="col-md-4 control-label">Weight</label>
						<div class="col-md-8">
						    <p class="form-control-static">
							<?php echo $contestant->weight; ?> kg
						    </p>
						</div>
					    </div>
					</form>
				    </div>
				    
				    <div class="col-md-4">
					<h2 class="scoring-sheet">Scoring Sheet</h2>
					
					<form class="form-horizontal">
				    <?php
					foreach($segment->criterias() AS $criteria)
					{
					    $criteria_score = $criteria->score($segment_judge->id, $segment_contestant->id); ?>
					    
					    <div class="form-group">
						<label class="col-md-5 control-label"><?php echo $criteria->name; ?></label>
						<div class="col-md-7">
						    <div class="input-group">
							<input type="text" class="form-control text-right contestant-criteria-score" placeholder="0.00" data-criteria="<?php echo $criteria->id; ?>" data-segment-contestant="<?php echo $segment_contestant->id; ?>" aria-describedby="percentage-addon" value="<?php echo $criteria_score->score; ?>" />
							<span class="input-group-addon" id="percentage-addon" data-percentage="<?php echo $criteria->percentage; ?>">/ <?php echo number_format($criteria->percentage, 0); ?></span>
						    </div>
						</div>
					    </div>
				    <?php
					} ?>
					    <div class="form-group">
						<label class="col-md-5 control-label">Total</label>
						<div class="col-md-7 text-right">
						    <h3 class="form-control-static contestant-total-score">100.00</h3>
						</div>
					    </div>
					</form>
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
	    </div><!--/.tab-content-->
	</div>
    </div><!--/.col-md-12-->
</div>