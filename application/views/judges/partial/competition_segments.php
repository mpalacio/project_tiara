<div class="page-header">
	<h1 class="clearfix">Competitions
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width: 10px">No</th>
					<th>Competitions</th>
					<th style="width: 30%">Segments</th>
					<th style="width: 140px;">&nbsp;&nbsp;&nbsp;Action</th>
				</tr>
			</thead>
			<tbody>
			<?php if(count($competition_segments)): ?>
				<?php $i = 1; ?>
				<?php foreach($competition_segments AS $competition_segment): ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $competition_segment->competition_name; ?></td>
						<td><?php echo $competition_segment->segment_name; ?></td>
						<td class="hidden-print">
							<?php echo anchor("judge/" . $competition_segment->segment_id, "Judge", "class='btn btn-default btn-sm'"); ?>
							<?php echo anchor("review/" . $competition_segment->segment_id, "Review", "class='btn btn-default btn-sm'"); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="4">No segments found.</td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>