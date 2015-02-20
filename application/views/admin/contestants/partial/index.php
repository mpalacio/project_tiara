<p class="text-right">
    <a href="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/create"); ?>" class="btn btn-default" id="create-contestant">Create</a>
    <a href="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/get"); ?>" class="btn btn-default" id="get-contestants">Get from Segment</a>
</p>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array($segment->contestants()) AND count($segment->contestants()))
            {
                foreach($segment->contestants() AS $contestant)
                { ?>
                <tr>
                    <td><?php echo $contestant->id; ?></td>
                    <td><?php echo $segment_contestant->number; ?></td>
                    <td><?php echo $contestant->first_name . " " . $contestant->last_name; ?></td>
                    <td><?php echo $contestant->birthday; ?></td>
                    <td><?php echo $contestant->status; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/remove/" . $contestant->id, "Remove", "class='btn btn-default btn-sm'"); ?>
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
                    <td colspan="7">Total: 1</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>