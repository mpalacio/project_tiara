<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
           
        </div>
        
        <div class="modal-body">
        <div role="tabpanel">

    <div class="page-header">
    <h1 class="clearfix">Mutya ng Dabaw <small>Selection of Top 15</small> 
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th><center>No</th>
                    <th><center>Contestants</th>
                    <th><center>Intelligence (25%)</th>
                    <th><center>Personality (25%)</th>
                    <th><center>Casual (20%)</th>
                    <th><center>Long Gown (20%)</th>
                    <th><center>Deportment (10%)</th>
                  
                </tr>
            </thead>
            <tbody>
       
                <tr>
                    <td><?php echo $competition->id; ?></td>
                    <td><?php echo $competition->Contestant_Names; ?></td>
                    <td><?php echo $competition->Intelligence; ?></td>
                    <td><?php echo $competition->Personality; ?></td>
                    <td><?php echo $competition->Casual; ?></td>
                    <td><?php echo $competition->Long_Gown; ?></td>
                    <td><?php echo $competition->Deportment; ?></td>
                    
                </tr>
         
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="12">Total: 1</td>
                </tr>
            </tfoot>
        </table>
        <?php echo anchor("admin/competitions/create", "Back", "id='competitions-create' class='btn btn-default pull-right hidden-print'"); ?>
    </div>
</div>
  </div>

</div>
           
        </div>
        
        
    </div>
</div>