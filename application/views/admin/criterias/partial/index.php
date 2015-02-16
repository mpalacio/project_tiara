<p class="text-right">
    <a href="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/create"); ?>" class="btn btn-default" id="create-contestant">Create</a>
    <a href="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/segment"); ?>" class="btn btn-default" id="get-contestants">Use Segment</a>
</p>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Percentage</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array(array()) AND count(array()))
            {
                foreach(array() AS $segment_criteria)
                {
                    $criteria = $segment_criteria->criteria(); ?>
                <tr>
                    <td><?php echo $criteria->id; ?></td>
                    <td><?php echo ""; ?></td>
                    <td><?php echo ""; ?></td>
                    <td><?php echo ""; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/edit/" . $criteria->id, "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/delete/" . $criteria->id, "Delete", "class='btn btn-default btn-sm'"); ?>
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