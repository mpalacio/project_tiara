<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Contestant</h4>
        </div>
        
        <div class="modal-body">
	    <div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
		    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
		    <li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="profile">
			<form action="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/save"); ?>" method="post">
			    <div class="form-group">
				<label for="name">Name</label>
				<div class="row">
				    <div class="col-md-4">
					<input type="text" class="form-control" id="first-name" placeholder="First" />
				    </div>
				    <div class="col-md-4">
					<input type="text" class="form-control" id="middle-name" placeholder="Middle" />
				    </div>
				    <div class="col-md-4">
					<input type="text" class="form-control" id="last-name" placeholder="Last" />
				    </div>
				</div>
			    </div>
			    
			    <div class="form-group">
				<div class="row">
				    <div class="col-md-4">
					<label for="name">Telephone</label>
					<input type="text" class="form-control" id="telephone" placeholder="Telephone" />
				    </div>
				    <div class="col-md-4">
					<label for="name">Mobile</label>
					<input type="text" class="form-control" id="mobile" placeholder="Mobile" />
				    </div>
				    <div class="col-md-4">
					<label for="name">E-mail</label>
					<input type="text" class="form-control" id="email" placeholder="E-mail" />
				    </div>
				</div>
			    </div>
			    
			    <div class="form-group">
				<div class="row">
				    <div class="col-md-6">
					<label for="name">Birthday</label>
					<input type="text" class="form-control" id="birthday" placeholder="Birthday" />
				    </div>
				    <div class="col-md-6">
					<label for="name">Religion</label>
					<input type="text" class="form-control" id="religion" placeholder="Religion" value="Roman Catholic"/>
				    </div>
				</div>
			    </div>
			    
			    <div class="form-group">
				<div class="row">
				    <div class="col-md-6">
					<label for="name">Citizenship</label>
					<input type="text" class="form-control" id="citizenship" placeholder="Citizenship" value="Filipino" />
				    </div>
				    <div class="col-md-6">
					<label for="name">Occupation</label>
					<input type="text" class="form-control" id="occupation" placeholder="Occupation" />
				    </div>
				</div>
			    </div>
			</form>
		    </div>
		    
		    <div role="tabpanel" class="tab-pane" id="photos">
			<form id="fileupload" action="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/upload"); ?>" method="post" enctype="multipart/form-data">
			    
			    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
			    
			    <div class="row fileupload-buttonbar">
				<div class="col-md-12">
				    <span class="btn btn-success fileinput-button">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Select files</span>
					<input type="file" name="files[]" multiple />
				    </span>
				    
				    <button type="submit" class="btn btn-primary start">
					<i class="glyphicon glyphicon-upload"></i>
					<span>Upload</span>
				    </button>
				    <button type="reset" class="btn btn-warning cancel">
					<i class="glyphicon glyphicon-ban-circle"></i>
					<span>Cancel</span>
				    </button>
				    
				    <span class="fileupload-process"></span>
				</div>
				
				<div class="col-md-12 fileupload-progress fade">
				    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-success" style="width:0%;"></div>
				    </div>
				    
				    <div class="progress-extended">&nbsp;</div>
				</div>
			    </div>
			    
			    <div id="dropzone" style="max-height: 290px; overflow-y: auto; overflow-x: hidden;">
				<table role="presentation" class="table table-striped">
				    <tbody class="files"></tbody>
				</table>
			    </div>
			</form>
		    </div>
		</div>
	    </div>
	</div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="save-contestant" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>