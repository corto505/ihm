 <?php $this->load->view('include/entete'); ?>

<!--  CALENDIER   -->
<div class="row">
    <div id="ladate">
        <div id="bartop">
            <span id="mois"></span>
        </div> 
        <div id="jour"></div>
    </div> 
</div> 

<div class="content" ng-controller="ctrlMeteo">
{{lameteo}}
    <div class="row">
      
       <div class="col-xs-12 col-md-4" ng:repeat="item in lameteo" >
                
            <div class="inter">
                <div class="bandeau">
                    <span> {{item.Name}} </span>
                </div>
                <div class="content">
                    <img src="<?php echo img_url('lampe.jpg'); ?>" />
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
</div>
    
<?php $this->load->view('include/footer'); ?>