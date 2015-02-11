<div class="page-header">
    <h1 class="clearfix"><?php echo anchor("admin/competitions/" . $competition->id . "/segments", $competition->name) . " <small>" . $segment->name . "</small>"; ?>
</div>

<div class="row">
    <div class="col-md-12">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
                <li role="presentation" class="active"><a href="#contestants" aria-controls="contestants" role="tab" data-toggle="tab">Contestants</a></li>
                <li role="presentation"><a href="#criterias" aria-controls="criterias" role="tab" data-toggle="tab">Criterias</a></li>
                <li role="presentation"><a href="#judges" aria-controls="judges" role="tab" data-toggle="tab">Judges</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="contestants">
                <?php $this->load->view("admin/contestants/partial/index", array("segment_contestants" => $segment->segment_contestants())); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="criterias">
                    
                </div>
                <div role="tabpanel" class="tab-pane" id="judges">
                    
                </div>
            </div>
        </div>
    </div>
</div>