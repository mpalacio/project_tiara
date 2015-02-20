<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Criteria</h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/criterias/update/" . $segment->id); ?>" method="post">
                <div class="form-group">
                    <div class="row">
			<div class="col-md-6">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $criteria->name; ?>" />
			</div>
			<div class="col-md-6">
			    <label for="name">Percentage</label>
			    <div class="input-group">
				<input type="text" class="form-control" id="percentage" placeholder="Percentage" value="<?php echo $criteria->percentage; ?>" aria-describedby="basic-addon-percent" />
				<span class="input-group-addon" id="basic-addon-percent">%</span>
			    </div>
			</div>
		    </div>
                </div>
		
		<div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Description" value="<?php echo $criteria->description; ?>" />
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="update-criteria" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>