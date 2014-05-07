 <?php $this->load->view('include/entete'); ?>
<div class="content" ng-controller="ctrlBtn">
    <div class="row" ng-show="!showActions" ng-swipe-left="showActions = true">
        
         <div class="col-xs-3 col-sm-4 col-md-3" ng:repeat='menu in btnMenu'>
                
            <div class="btn_std {{menu.couleur}} button">
                <div class="bandeau">
                    <span> {{menu.nom}} </span>
                </div>
                <div class="content">
                    <button class="btn {{menu.couleur}} btn-lg" ng:click="pipo('M12')">
                        <span class="glyphicon glyphicon-{{menu.icone}}"></span>
                    </button>
                </div>
                <div class="footer">
                        <span>{{menu.pied}}</span>
                </div>
            </div>
                
         </div>
    </div>
    

     <div class="row" ng-show="showActions" ng-swipe-right="showActions = false">
         <div class="col-xs-3 col-sm-4 col-md-3" ng:repeat='bouton in lesBoutons'>
                
            <div class="btn_std {{bouton.couleur}} button">
                <div class="bandeau">
                    <span> {{bouton.nom}} </span>
                </div>
                <div class="content">
                    <button class="btn {{bouton.couleur}}" ng:click="pipo('M12')">
                        <span class="glyphicon glyphicon-{{bouton.icone}}"></span>
                    </button>
                </div>
                <div class="footer">
                    <a href="#" id='testclick2'>
                        <span>{{bouton.pied}}</span>
                    </a>
                </div>
            </div>
                
         </div>
    </div>

    <a href="#" id='testclick'>
                        <span>Click out angular</span>
     </a>
</div>
<?php $this->load->view('include/footer'); ?>
