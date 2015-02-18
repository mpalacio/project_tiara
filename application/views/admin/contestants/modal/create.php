<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Contestant</h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("admin/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/contestants/save"); ?>" method="post">
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
			    <input type="text" class="form-control" id="religion" placeholder="Religion" />
			</div>
		    </div>
                </div>
		
		<div class="form-group">
                    <div class="row">
			<div class="col-md-6">
			    <label for="name">Citizenship</label>
			    <input type="text" class="form-control" id="citizenship" placeholder="Citizenship" />
			</div>
			<div class="col-md-6">
			    <label for="name">Occupation</label>
			    <input type="text" class="form-control" id="occupation" placeholder="Occupation" />
			</div>
		    </div>
                </div>
            </form>
	    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
		<!-- Redirect browsers with JavaScript disabled to the origin page -->
		<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="row fileupload-buttonbar">
		    <div class="col-lg-7">
			<!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn btn-success fileinput-button">
			    <i class="glyphicon glyphicon-plus"></i>
			    <span>Add files...</span>
			    <input type="file" name="files[]" multiple>
			</span>
			<button type="submit" class="btn btn-primary start">
			    <i class="glyphicon glyphicon-upload"></i>
			    <span>Start upload</span>
			</button>
			<button type="reset" class="btn btn-warning cancel">
			    <i class="glyphicon glyphicon-ban-circle"></i>
			    <span>Cancel upload</span>
			</button>
			<button type="button" class="btn btn-danger delete">
			    <i class="glyphicon glyphicon-trash"></i>
			<span>Delete</span>
			</button>
			<input type="checkbox" class="toggle">
			<!-- The global file processing state -->
			<span class="fileupload-process"></span>
		    </div>
		<!-- The global progress state -->
		    <div class="col-lg-5 fileupload-progress fade">
			<!-- The global progress bar -->
			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
			    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
			</div>
			<!-- The extended global progress state -->
			<div class="progress-extended">&nbsp;</div>
		    </div>
		</div>
		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
	    </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="save-contestant" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>