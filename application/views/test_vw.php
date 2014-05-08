 <?php $this->load->view('include/entete'); ?>
<div class="content" ng-controller="ctrlBtn">
<!--   MENU PRINCIPALE -->
    <div class="row" id="tabTdb" ng-show="!showActions" ng-swipe-left="showActions = true">
            <div class="col-xs-3 col-sm-4 col-md-3" ng:repeat="bouton in lesBoutonsMenu" >
                
            <div class="btn_std {{bouton.couleur}} button">
                <div class="bandeau">
                    <span> {{bouton.nom}} - {{bouton.type}}</span>
                </div>
                <div class="content">
                    <a href="{{bouton.url}}" class="btn" type="button">
                        <span class="glyphicon glyphicon-{{bouton.icone}}"></span>
                    </a>
                </div>
                <div class="footer">
                     <span>{{bouton.pied}}</span>
                </div>
            </div>
                
         </div>
        
    </div>
<!-- TABLEAU DE BORD -->
     <div class="row" id="tabMenu" ng-show="showActions" ng-swipe-right="showActions = false" >

         <div class="col-xs-3 col-sm-4 col-md-3" ng:repeat="menu in lesBoutonsTdb">
                
            <div class="btn_std {{menu.couleur}} button">
                <div class="bandeau">
                    <span> {{menu.nom}} - {{menu.type}} </span>
                </div>
                <div class="content">
                    <a href="{{menu.url}}">
                        <span class="glyphicon glyphicon-{{menu.icone}}"></span>
                    </a>
                </div>
                <div class="footer">
                        <span>{{menu.pied}}</span>
                </div>
            </div>
                
         </div>
    </div>

    <a href="#" id='testclick'>
            <span>Click out angular</span>
     </a>
</div>
<?php $this->load->view('include/footer'); ?>
