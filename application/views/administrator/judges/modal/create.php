<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Judge</h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/save"); ?>" method="post">
                <div class="form-group">
                    <label for="name">Number</label>
                    <div class="row">
			<div class="col-md-6">
			    <input type="text" class="form-control" id="number" placeholder="Number" />
			</div>
		    </div>
                </div>
		<div class="form-group">
                    <label for="name">Name</label>
                    <div class="row">
			<div class="col-md-6">
			    <input type="text" class="form-control" id="first-name" placeholder="First" />
			</div>
			<div class="col-md-6">
			    <input type="text" class="form-control" id="last-name" placeholder="Last" />
			</div>
		    </div>
                </div>
		
                <div class="form-group">
                    <div class="row">
			<div class="col-md-6">
			    <label for="name">Username</label>
			    <input type="text" class="form-control" id="username" placeholder="Username" />
			</div>
			<div class="col-md-6">
			    <label for="name">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" />
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