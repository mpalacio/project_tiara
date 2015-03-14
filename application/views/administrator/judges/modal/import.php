<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Import Judge from <?php echo $source_segment->name; ?></h4>
        </div>
        
        <div class="modal-body">
            <form action="<?php echo base_url("administrator/competitions/" . $segment->competition_id . "/segments/" . $segment->id . "/judges/join"); ?>" method="post">
                <table class="table">
		    <thead>
			<tr>
			    <th class="col-md-2">
				<input type="checkbox" id="select-segment-judges" data-target="segment-judge" />&nbsp;
			    </th>
			    <th class="col-md-3">Number</th>
			    <th>Name</th>
			</tr>
		    </thead>
		    <tbody>
		    <?php
			foreach($source_segment->judges() AS $segment_judge)
			{
			    $judge = $segment_judge->judge(); ?>
			<tr>
			    <td>
				<div class="checkbox">
				    <label><input type="checkbox" class="segment-judge" data-judge="<?php echo $judge->id; ?>" />&nbsp;</label>
				</div>
			    </td>
			    <td><input type="text" class="form-control segment-judge-number" value="<?php echo $segment_judge->number; ?>" /></td>
			    <td><p class="form-control-static"><?php echo $judge->first_name . " " . $judge->last_name; ?></p></td>
			</tr>
		    <?php    
			}
		    ?>
		    </tbody>
		</table>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="import-segment-judge" class="btn btn-primary">Import</button>
        </div>
    </div>
</div>