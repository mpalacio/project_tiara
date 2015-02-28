<p class="text-right">
    <a href="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/rankings"); ?>" class="btn btn-default" target="_blank">Print</a>
</p>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Number</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
        <?php
	    $segment_contestants = array(); //$segment->contestants_by_ranking();
            
	    if(is_array($segment_contestants) AND count($segment_contestants))
            {
                foreach($segment_contestants AS $key => $segment_contestant)
                {
                    $contestant = $segment_contestant->contestant(); ?>
                <tr>
                    <td><?php echo ordinal_suffix($key + 1); ?></td>
                    <td><?php echo $segment_contestant->number; ?></td>
                    <td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
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
                    <td colspan="7">Total: <?php echo count($segment_contestants); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>