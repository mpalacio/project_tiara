<div class="clearfix">
    <p class="pull-right">
        <button class="btn btn-default">Fetch from Segment</button>
        <button class="btn btn-default">Create</button>
    </p>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th >Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array($segment_contestants) AND count($segment_contestants))
            {
                foreach($segment_contestants AS $segment_contestant)
                {
                    $contestant = $segment_contestant->contestant(); ?>
                <tr>
                    <td><?php echo $contestant->id; ?></td>
                    <td><?php echo $segment_contestant->number; ?></td>
                    <td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
                    <td><?php echo ""; ?></td>
                    <td><?php echo ""; ?></td>
                    <td><?php echo ""; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("admin/segment/edit/" . $segment->id, "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("admin/segment/delete/" . $segment->id, "Delete", "class='btn btn-default btn-sm'"); ?>
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