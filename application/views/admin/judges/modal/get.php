<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Get Judge from Segment</h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("admin/competition/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/include"); ?>" method="post">
                <div class="form-group">
                    <div class="row">
			<div class="col-md-6">
			    <label for="name">Segment</label>
			    <select class="form-control"></select>
			</div>
			<div class="col-md-6">
			    <label for="name">Judge</label>
			    <select class="form-control">
			    </select>
			</div>
		    </div>
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="save-judge" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>