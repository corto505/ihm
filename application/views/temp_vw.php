 <?php $this->load->view('include/entete'); ?>
 <h3 class="text-center"> <?php echo $leType ;?></h3>
<div class="content" ng-controller="ctrlModules">
    <div class="row" ng-init="filterOptions ={val : '<?php echo $leType ;?>'}">

    	 <div class="col-xs-12 col-md-4" ng:repeat="item in lesmodules  | filter :{ Type : filterOptions.val }" >
                
            <div class="thermo" ng:class=" {'btn-blue' : item.Temp < 18 , 'btn-orange' : item.Temp >= 18  }">
                <div class="bandeau">
                    <span> {{item.Name}}</span>
                    <div class="progress">
                        <div class="progress-bar" ng:class=" {'progress-bar-success' : item.BatteryLevel > 52 , 'progress-bar-warning' : item.BatteryLevel < 52  }" role="progressbar" aria-valuenow="{{item.BatteryLevel}}" aria-valuemin="0" aria-valuemax="100" style="width: {{item.BatteryLevel}}%">
                         batterie</div>
                    </div>
                </div>
                
                <div class="content">
                    <div class="image">
                        <div ng:if="item.Temp < 18"> <img src="<?php echo img_url('weather/31.png'); ?>" /></div>
                        <div ng:if="item.Temp >= 18"> <img src="<?php echo img_url('weather/30.png'); ?>" /></div>
                    </div>
                    <div class="bouttons">
                        <span class="degre">{{item.Data}}</span>
                    </div>
                </div>
                <div class="footer">
                    <span>({{item.idx}}) - {{item.LastUpdate}} </span>
                </div>
            </div>
                
         </div>
            
       
    </div>

</div>

<?php $this->load->view('include/footer'); ?>