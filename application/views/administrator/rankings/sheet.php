<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name; ?> <small><?php echo $segment->name ?></small>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody>
        <?php
	    $segment_contestants = $segment->contestants_by_ranking();
            
	    if(is_array($segment_contestants) AND count($segment_contestants))
            {
                foreach($segment_contestants AS $key => $segment_contestant)
                {
                    $contestant = $segment_contestant->contestant(); ?>
                <tr>
                    <td><?php echo ordinal_suffix($key + 1); ?></td>
                    <td><?php echo $segment_contestant->number; ?></td>
                    <td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
                    <td><?php echo $segment_contestant->average(); ?></td>
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