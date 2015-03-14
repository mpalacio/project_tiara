<div class="page-header">
    <h1 class="clearfix"><?php echo $competition->name . " <small>Segments</small>" . anchor("administrator/competitions/" . $competition->id . "/segments/create", "Create", "id='segments-create' class='btn btn-default pull-right hidden-print'"); ?>
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
                    <td><?php echo anchor("administrator/competitions/" . $competition->id . "/segments/view/" . $segment->id, $segment->name); ?></td>
                    <td><?php echo $segment->venue; ?></td>
                    <td><?php echo $segment->description; ?></td>
                    <td><?php echo $segment->date; ?></td>
                    <td class="col-md-1">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-eye-<?php echo ($segment->status) ? "open" : "close"; ?>"></span></span>
                        <?php
                            echo anchor("administrator/competitions/" . $competition->id . "/segments/" . (($segment->status) ? "close" : "open") . "/" . $segment->id, (($segment->status) ? "Close" : "Open"), "class='btn btn-default btn-sm segment-change-status'"); ?>
                        </div>
                    </td>
                    <td class="hidden-print">
                        <?php echo anchor("administrator/segment/edit/" . $segment->id, "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("administrator/segment/delete/" . $segment->id, "Delete", "class='btn btn-default btn-sm'"); ?>
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