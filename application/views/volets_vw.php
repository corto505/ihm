 <?php $this->load->view('include/entete_noangular'); ?>
	<div class="refreshme"> => </div>
<div class="content" >
	<div class="row" id="tabMeteo">
		<div class="col-xs-3 col-sm-3 col-md-3" >
                 
	           <div class="btn-green">
	            	<div class="text-center vlt_titre text-danger">All (-P) auto </div>
	            	<div class=" text-center">
	            		<a hre="#" idgp="all-auto" idordre="haut" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-arrow-up glyphicon-2x"></a><br>
	            		<a hre="#" idgp="all-auto"  idordre="stop" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-stop glyphicon-2x"></a><br>
	            		<a hre="#" idgp="all-auto" idordre="bas" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-arrow-down glyphicon-2x"></a><br>
	            		</div>
	        	</div>

         </div>


		<div class="col-xs-3 col-sm-3 col-md-3" >
        
                 
	           <div class="btn-default">
	            	<div class="text-center vlt_titre text-danger">All (-P) demi </div>
	            	<div class="text-center">
	            		<a hre="#" idgp="all-demi" idordre="haut" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-arrow-up glyphicon-2x"></a><br>
	            		<a hre="#" idgp="all-demi"  idordre="stop"  delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-stop glyphicon-2x"></a><br>
	            		<a hre="#" idgp="all-demi" idordre="bas" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-arrow-down glyphicon-2x"></a><br>
	            		</div>
	        	</div>

         </div>

		<div class="col-xs-3 col-sm-3 col-md-3" >
         
                 
	           <div class="btn-danger">
	            	<div class="text-center vlt_titre text-danger">All manuel </div>
	            	<div class="text-center">
	            		<a hre="#" idgp="all-manuel" idordre="haut" delai="1000" type="button" class="vlt_sc_gp vlt_gp_btn btn vlt_btn glyphicon glyphicon-arrow-up glyphicon-2x"></a><br>
	            		<a hre="#"  type="button" class="vlt_gp_btn btn vlt_btn glyphicon glyphicon-stop glyphicon-2x"></a><br>
	            		</div>
	        	</div>

				<div class="btn-group">
			  		<div class="btn-group">
						<a href="#" id="vlt_init" class="vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-cog glyphicon-2x"></a>
						<a href="#" typebtn="On" idbtn="49" class="btn_appareil vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-phone-alt glyphicon-2x"></a>
						<a href="#" id="testBtn" class="vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-question-sign glyphicon-2x"></a>
						
					</div>
			  </div>

         </div>

		<div class="col-xs-3 col-sm-3 col-md-3" >
         
                 
	           <div class="btn-info">
	            	<div class="text-center vlt_titre text-danger">Portail </div>
	            	<div class="text-center">
						<a href="#" idbtn="7" delai="800" type="button" class="vlt_sc vlt_gp_btn btn vlt_btn glyphicon glyphicon-road glyphicon-2x"></a><br>
						<a href="#" idbtn="8" delai="800" type="button" class="vlt_sc vlt_gp_btn btn  vlt_btn glyphicon glyphicon-home glyphicon-2x"></a><br>
	            		<a href="#" idgp="portail" idordre="bas" type="button" class="vlt_sc_gp vlt_gp_btn btn  vlt_btn glyphicon glyphicon-step-forward glyphicon-2x"></a><br>
					</div>
	        	</div>

         </div>

			
	</div>
    <div class="row" id="tabMenu">
 
           	 <?php foreach ($les_volets as $key => $module) { ?>
               <div class="col-xs-3 col-sm-3 col-md-3" >
                 
                   <div class="btn-purple">
		            	<div class="text-center vlt_titre text-danger"><?php echo $module['name']; ?> </div>
		            	<div class="commande text-center">
		            		<a hre="#" idbtn="<?php echo $module['haut']; ?>" delai="200" class="vlt_sc vlt_btn glyphicon glyphicon-arrow-up glyphicon-2x"><h6><?php echo $module['haut']; ?></h6></a><br>
		            		<a hre="#" idbtn="<?php echo $module['stop']; ?>"  delai="200" class="vlt_sc vlt_btn glyphicon glyphicon-stop glyphicon-2x"><h6><?php echo $module['stop']; ?></h6></a><br>
		            		<a hre="#" idbtn="<?php echo $module['bas']; ?>" delai="200" class="vlt_sc vlt_btn glyphicon glyphicon-arrow-down glyphicon-2x"><h6><?php echo $module['bas']; ?></h6></a><br>
		            	</div>
	            	</div>

                 </div>
           
           <?php } ?>

     </div>
	<div id="retour" class="alert"></div>


</div>
 <?php $this->load->view('include/footer_volet'); ?>
