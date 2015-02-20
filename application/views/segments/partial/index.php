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
		    <th>Status</th>
		    <th>&nbsp;</th>
		</tr>
	    </thead>
	    
	    <tbody>
	<?php
	    if(is_array($judge->segments()) AND count($judge->segments()))
	    {
		foreach($judge->segments() AS $segment)
		{ ?>
		<tr>
                    <td><?php echo $segment->id; ?></td>
                    <td><?php echo $segment->name; ?></td>
                    <td><?php echo $segment->venue; ?></td>
                    <td><?php echo $segment->description; ?></td>
                    <td><?php echo $segment->date; ?></td>
                    <td><?php echo $segment->status; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor($competition->slug . "/judges/" . $segment->slug, "Judge", "class='edit-competitions btn btn-default btn-sm'"); ?>
                    </td>
                </tr>
		<?php
                }
            } 
            else
            { ?>
                <tr>
                    <td colspan="7"></td>
                </tr>
        <?php
            } ?>
	    </tbody>
	    
	    <tfoot>
                <tr>
                    <td colspan="7">Total: 1</td>
                </tr>
            </tfoot>
	</table>
    </div>
</div>
