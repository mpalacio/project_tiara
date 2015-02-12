<p class="text-right">
<?php echo anchor("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/create", "Create", "id='create-judges' class='btn btn-default'"); ?>
    <button class="btn btn-default">Fetch from Segment</button>
</p>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array($segment_judges) AND count($segment_judges))
            {
		foreach($segment_judges AS $segment_judge)
                {
                    $judge = $segment_judge->judge(); ?>
                <tr>
                    <td><?php echo $judge->id; ?></td>
                    <td><?php echo $judge->first_name . " " . $judge->last_name; ?></td>
                    <td><?php echo $judge->username; ?></td>
                    <td><?php echo $judge->status; ?></td>
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