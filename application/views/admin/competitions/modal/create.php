<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Competition</h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("admin/competitions/save"); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Description" />
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" id="date" class="form-control" placeholder="MM/DD/YYYY" />
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="save-competition" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>