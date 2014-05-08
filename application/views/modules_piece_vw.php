 <?php $this->load->view('include/entete'); ?>
 <h2> Titre - <?php echo $leType ;?></h2>
<div class="content" ng-controller="ctrlModules">

    <div class="row" ng-init="filterOptions ={val : '<?php echo $leType ;?>'}">
    	
    	 <div class="col-xs-12 col-md-4" ng:repeat="item in lesmodules  | filter :{ Name : filterOptions.val }" >
                
            <div class="inter">
                <div class="bandeau">
                    <span> {{item.Name}} </span>
                </div>
                <div class="content">
                    <img src="../assets/images/lampe.jpg" />
                    <div class="bouttons">
                        <button class="bnt btn-success btn-lg btn_appareil" type="button" typebtn="On" idbtn="{{item.idx}}">On</button><br><br>
                        <button class="bnt btn-danger btn-lg btn_appareil" type="button" typebtn="Off" idbtn="{{item.idx}}">Off</button>
                    </div>
                </div>
                <div class="footer">
                    <span>({{item.idx}}) - {{item.Type}} </span>
                </div>
            </div>
                
         </div>
            
       
    </div>

<button class="bnt btn-success btn-lg btn_appareil" type="button" typebtn="On" idbtn="11">On</button>

</div>

<?php $this->load->view('include/footer'); ?>