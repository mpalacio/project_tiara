<p class="text-right">
    <a href="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/create"); ?>" class="btn btn-default" id="create-contestant">Create</a>
    <a href="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/segment"); ?>" class="btn btn-default" id="get-contestants">Use Segment</a>
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
            if(is_array($segment->criterias()) AND count($segment->criterias()))
            {
                foreach($segment->criterias() AS $segment_criteria)
                { ?>
                <tr>
                    <td><?php echo $segment_criteria->id; ?></td>
                    <td><?php echo $segment_criteria->name;; ?></td>
                    <td><?php echo $segment_criteria->description; ?></td>
                    <td class="text-right"><?php echo $segment_criteria->percentage; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/edit/" . $segment_criteria->id, "Edit", "class='edit-criteria btn btn-default btn-sm'"); ?>
                        <?php echo anchor("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/delete/" . $segment_criteria->id, "Delete", "class='btn btn-default btn-sm'"); ?>
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