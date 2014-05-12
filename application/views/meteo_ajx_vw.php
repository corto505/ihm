 <?php $this->load->view('include/entete'); ?>

<!--  CALENDIER   -->
<div class="row" id="tabMenu">
    <div id="ladate">
        <div id="bartop">
            <span id="mois"></span>
        </div> 
        <div id="jour"></div>
    </div> 
</div> 


<div class="content" ng-controller="ctrlMeteo" id="tabMeteo">
    <a href="/ihm/index.php/welcome/meteo_api/caen/file" class="btn btn-large btn-green" type="button"> <span class="glyphicon glyphicon-2x glyphicon-refresh"> </span></a>

    <div class="row">
      
       <div class="col-xs-3 col-md-3" ng:repeat="item in lameteo.list  | filter :{ dt_txt : '12:00:00' }" >
                
            <div class="cadre_meteo">
                <div class="bandeau_date">
                    <span> {{item.dt_txt}}</span>
                </div>
                <div class="bandeau">
                     <span> temp. mini : {{item.main.temp_min}} </span> - <span> maxi : {{item.main.temp_max}} </span>
                     <br>
                     <span> pression : {{item.main.pressure}} </span><br>
                </div>
                <div class="content">
                    <div class="temp">
                        <span >Temp. : {{item.main.temp}}°</span><br>
                    </div>
                    <img src="<?php echo img_url('weather/{{item.weather[0].icon}}.png') ?>" class="img-responsive" />
                    <p>{{item.weather[0].description}}</p>
                </div>
                <div class="footer">
                    <span>vent : {{item.wind.speed}} - dir. : {{item.wind.deg}} </span>
                </div>
            </div>
                
         </div>
            
       
    </div>
</div>
    
<?php $this->load->view('include/footer'); ?>