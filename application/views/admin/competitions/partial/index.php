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
                <tr>
                    <td>1</td>
                    <td>Mutya ng Dabaw 2015</td>
                    <td>78th Araw ng Davao Beauty Pageant</td>
                    <td>February 28, 2015</td>
                    <td>On-going</td>
                    <td class="hidden-print">
                        <?php echo anchor("admin/competitions/edit/1", "Edit", "class='edit-competitions btn btn-default btn-sm'"); ?>
                        <?php echo anchor("admin/competitions/delete/1", "Delete", "class='btn btn-default btn-sm'"); ?>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Total: 1</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>