<div class="page-header">
    <h1>
	<?php echo $competition->name; ?>
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
	<table class="table table-stripped table-bordered">
	    <thead>
		<tr>
		    <th>#</th>
		    <th>Segment</th>
		    <th>Venue</th>
		    <th>Description</th>
		    <th>Date</th>
		    <th>&nbsp;</th>
		</tr>
	    </thead>
	    
	    <tbody>
	<?php
	    if(is_array($judge_segments) AND count($judge_segments))
	    {
		foreach($judge_segments AS $judge_segment)
		{
		    $segment = $judge_segment->segment();
		    $segment_judge = $segment->judge($judge->id); ?>
		<tr>
                    <td><?php echo $segment->id; ?></td>
                    <td><?php echo $segment->name; ?></td>
                    <td><?php echo $segment->venue; ?></td>
                    <td><?php echo $segment->description; ?></td>
                    <td><?php echo date("F j, Y h:iA", strtotime($segment->date)); ?></td>
                    <td class="hidden-print">
                        <?php echo anchor($competition->slug . "/judges/" . $segment->slug, (($segment_judge->status) ? "Judge" : "Review"), "class='edit-competitions btn btn-default btn-sm'"); ?>
                    </td>
                </tr>
		<?php
                }
            } 
            else
            { ?>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
        <?php
            } ?>
	    </tbody>
	    
	    <tfoot>
                <tr>
                    <td colspan="7">Total: <?php echo count($judge_segments); ?></td>
                </tr>
            </tfoot>
	</table>
    </div>
</div>