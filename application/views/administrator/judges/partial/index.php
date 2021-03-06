<div class="text-right" style="margin: 0 0 10px;">
    <div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	    Import from Segment <span class="caret"></span>
	</button>
	
	<ul class="dropdown-menu" role="menu">
	<?php
	    foreach($competition->segments() AS $s)
	    {
		if($s->id <> $segment->id)
		{ ?>
	    <li>
		<?php echo anchor("administrator/competitions/" . $competition->id . "/segments/" . $segment->id . "/judges/import/" . $s->id, $s->name, "class='import-judge'"); ?>
	    </li>
	<?php
		}
	    } ?>
	</ul>
    </div>
    <a href="<?php echo base_url("administrator/competitions/" . $competition->id . "/segments/" . $segment->id . "/judges/create"); ?>" class="btn btn-default" id="create-judge">Create</a>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php 
            if(is_array($segment->judges()) AND count($segment->judges()))
            {
		foreach($segment->judges() AS $segment_judge)
                {
		    $judge = $segment_judge->judge(); ?>
                <tr>
                    <td><?php echo $segment_judge->number; ?></td>
                    <td><?php echo $judge->first_name . " " . $judge->last_name; ?></td>
                    <td><?php echo $judge->username; ?></td>
                    <td><?php echo $segment_judge->status; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("administrator/segment/edit/" . $segment->id, "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("administrator/segment/delete/" . $segment->id, "Delete", "class='btn btn-default btn-sm'"); ?>
			<div class="btn-group">
			    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Print <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
				<li><?php echo anchor("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/sheet/" . $segment_judge->id . "/empty", "Contestant List", "class='' target='_blank'"); ?></li>
				<li><?php echo anchor("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/sheet/" . $segment_judge->id . "/score", "Contestant List Scores", "class='' target='_blank'"); ?></li>
			    </ul>
			</div>
                    </td>
                </tr>
        <?php
                }
            }
            else
            { ?>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
        <?php
            } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Total: <?php echo count($segment->judges()); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>