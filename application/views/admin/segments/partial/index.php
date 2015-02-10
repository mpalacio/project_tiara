<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name . " <small>Segments</small>" . anchor("admin/competitions/" . $competition->id . "/segments/create", "Create", "id='segments-create' class='btn btn-default pull-right hidden-print'"); ?>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Venue</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array($competition->segments()) AND count($competition->segments()))
            {
                foreach($competition->segments() AS $segment)
                { ?>
                <tr>
                    <td><?php echo $segment->id; ?></td>
                    <td><?php echo anchor("admin/competitions/" . $competition->id . "/segments/view/" . $segment->id, $segment->name); ?></td>
                    <td><?php echo $segment->venue; ?></td>
                    <td><?php echo $segment->description; ?></td>
                    <td><?php echo $segment->date; ?></td>
                    <td><?php echo $segment->status; ?></td>
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