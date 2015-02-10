<div class="page-header">
    <h1 class="clearfix">Competitions <?php echo anchor("admin/competitions/create", "Create", "id='competitions-create' class='btn btn-default pull-right hidden-print'"); ?>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="hidden-print">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(is_array($competitions) AND count($competitions))
            {
                foreach($competitions AS $competition)
                { ?>
                <tr>
                    <td><?php echo $competition->id; ?></td>
                    <td><?php echo $competition->name; ?></td>
                    <td><?php echo $competition->description; ?></td>
                    <td><?php echo $competition->date; ?></td>
                    <td><?php echo $competition->status; ?></td>
                    <td class="hidden-print">
                        <?php echo anchor("admin/competitions/edit/" . $competition->id, "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("admin/competitions/delete/" . $competition->id, "Delete", "class='btn btn-default btn-sm'"); ?>
                    </td>
                </tr>
        <?php
                }
            } 
            else
            { ?>
                <tr>
                    <td colspan="6"></td>
                </tr>
        <?php
            } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Total: 1</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>