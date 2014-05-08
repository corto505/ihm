 <?php $this->load->view('include/entete'); ?>
<div class="content" ng-controller="ctrlModules">

<!--   MENU PRINCIPALE -->
    <div class="row">
            <div class="col-xs-3 col-sm-4 col-md-3" ng:repeat="item in lesmodules" >
                
            <div class="btn_std button">
                <div class="bandeau">
                    <span> {{item.Name}} - {{item.idx}}</span>
                </div>
                <div class="content">
                    <button class="btn {{item.couleur}} btn_appareil">
                        <span class="glyphicon glyphicon-{{item.icone}}"></span>
                    </button>
                </div>
                <div class="footer">
                    <a href="#" id="testclick2" class="btn_appareil">
                        <span>{{item.Type}} </span>
                    </a>
                </div>
            </div>
                
         </div>
        
    </div>


</div>
<?php $this->load->view('include/footer'); ?>
