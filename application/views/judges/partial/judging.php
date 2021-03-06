<div class="page-header">
	<h1 class="clearfix">Mutya ng Dabaw <small>Selection of Top 15</small>
</div>

<div class="row">
	<div class="col-md-12">
		<?php if(count($segment_criterias) != 0 || count($segment_as_criteria_criterias) != 0): ?>
		<?php echo anchor("#", "Submit", "id='submit-judging' class='btn btn-default pull-right hidden-print'"); ?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><center>No</th>
					<th><center>Contestants</th>
					<?php foreach($segment_criterias as $segment_criteria): ?>
						<?php echo "<th><center title='{$segment_criteria->description}'>{$segment_criteria->name} ({$segment_criteria->percentage}%)</th>"; ?>
					<?php endforeach; ?>
					<?php foreach($segment_as_criteria_criterias as $segment_as_criteria_criteria): ?>
						<?php echo "<th><center title='{$segment_criteria->description}'>{$segment_as_criteria_criteria->name} ({$segment_criteria->percentage}%)</th>"; ?>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
			<?php if(count($contestants) > 0): ?>
				<?php foreach($contestants as $contestant): ?>
					<tr>
						<td><?php echo $contestant->contestant_id; ?></td>
						<td><?php echo $contestant->first_name." ".$contestant->last_name; ?></td>
						<?php foreach($segment_criterias as $segment_criteria): ?>
							<?php echo "<td><input type='text' class='form-control' data-segment-contestant-id='{$contestant->segment_contestant_id}' data-segment-criteria-id='{$segment_criteria->id}' data-segment-name='{$segment_criteria->name}' data-segment-judge='{$segment_judge->id}'></td>"; ?>
						<?php endforeach; ?>
						<?php foreach($segment_as_criteria_criterias as $segment_as_criteria_criteria): ?>
							<?php echo "<td></td>"; ?>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="<?php echo count($segment_criterias) + count($segment_as_criteria_criterias) + 2; ?>">No contestants found.</td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php else: ?>
		There are no criterias added for this segment yet.
	<?php endif; ?>
	</div>
</div>