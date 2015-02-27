<div class="page-header">
    <h1 class="clearfix"><?php echo anchor("administrator/competitions/" . $competition->id . "/segments", $competition->name) . " <small>" . $segment->name . "</small>"; ?>
</div>

<div class="row">
    <div class="col-md-12">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs hidden-print" role="tablist" style="margin-bottom: 15px;">
                <li role="presentation" class="active"><a href="#contestants" aria-controls="contestants" role="tab" data-toggle="tab">Contestants</a></li>
                <li role="presentation"><a href="#criterias" aria-controls="criterias" role="tab" data-toggle="tab">Criterias</a></li>
                <li role="presentation"><a href="#judges" aria-controls="judges" role="tab" data-toggle="tab">Judges</a></li>
                <li role="presentation"><a href="#rankings" aria-controls="rankings" role="tab" data-toggle="tab">Rankings</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="contestants">
                <?php $this->load->view("administrator/contestants/partial/index", array("segment" => $segment)); ?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="criterias">
                <?php $this->load->view("administrator/criterias/partial/index", array("segment" => $segment)); ?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="judges">
                <?php $this->load->view("administrator/judges/partial/index", array("segment" => $segment)); ?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="rankings">
                <?php $this->load->view("administrator/rankings/partial/index", array("segment" => $segment)); ?>
                </div>
            </div>
        </div>
    </div>
</div>