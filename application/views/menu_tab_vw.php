<?php $this->load->view('include/entete_simple'); ?>


    <div class="content_onglet">

         <div id="contenu1">

        </div>

        <div id="contenu2">
            <?php foreach ($btn_tdb as $key => $value) {?>
        
                <div class="col-xs-3 col-sm-4 col-md-3">
                    
                    <div class="btn_std <?php echo $value['couleur']; ?> button">
                        <div class="bandeau">
                                 <span> <?php echo $value['nom']; ?> </span>
                            </div>
                        <div class="content_std" >
                                 <span class="glyphicon glyphicon-3x glyphicon-<?php echo $value['icone']; ?> "></span>
                                <div class="bouttons">
                                    <button class="bnt btn-success btn-lg btn_appareil" type="button" typebtn="On" idbtn="<?php echo $value['idbtn']; ?>">On</button><br><br>
                                    <button class="bnt btn-danger btn-lg btn_appareil" type="button" typebtn="Off" idbtn="<?php echo $value['idbtn']; ?>">Off</button>
                                </div>
                            </div>
                        
                    </div>
                        
                 </div>
            <?php } ?>
        </div>


        <div id="contenu3">

             <div class="row">
                        
                <div class="btn-toolbar" role="toolbar">
                  <div class="btn-group ">
                        <div class="btn-group">
                          <button idgp="all-auto" idordre="haut" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-blue glyphicon glyphicon-arrow-up glyphicon-2x"></button>
                          <button idgp="all-auto"  idordre="stop" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-blue glyphicon glyphicon-stop glyphicon-2x"></button>
                          <button idgp="all-auto" idordre="bas" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-blue glyphicon glyphicon-arrow-down glyphicon-2x"></button>
                        </div>
                        <div class="text-center small">All auto</div>
                  </div>

                  <div class="btn-group">
                        <div class="btn-group">
                          <button idgp="all-demi" idordre="haut" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-yellow glyphicon glyphicon-arrow-up glyphicon-2x"></button>
                          <button idgp="all-demi" idordre="stop" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-yellow glyphicon glyphicon-stop glyphicon-2x"></button>
                          <button idgp="all-demi" idordre="bas" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-yellow glyphicon glyphicon-arrow-down glyphicon-2x"></button>
                        </div>
                        <div class="text-center small">All demi</div>
                  </div>

                  <div class="btn-group ">
                        <div class="btn-group">
                          <button idgp="all-manuel" idordre="haut" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-danger glyphicon glyphicon-arrow-up glyphicon-2x"></button>
                          <button idgp="all-manuel" idordre="stop" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-danger glyphicon glyphicon-stop glyphicon-2x"></button>
                        </div>
                        <div class="text-center small">All manuel</div>
                  </div>

                   <div class="btn-group ">
                        <div class="btn-group">
                          <button idbtn="2" delai="800" type="button" class="vlt_sc vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-road glyphicon-2x"></button>
                          <button idbtn="3" delai="800" type="button" class="vlt_sc vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-home glyphicon-2x"></button>
                          <button idgp="portail" idordre="bas" type="button" class="vlt_sc_gp vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-step-forward glyphicon-2x"></button>
                          <button id="vlt_init" class="vlt_gp_btn btn btn-default btn-green glyphicon glyphicon-cog glyphicon-2x"></button>
                        </div>
                        <div class="text-center small">Portail</div>
                  </div>
                      
                </div>
                        
                 <button idgp="test-all" idordre="haut" type="button" class="vlt_sc_gp btn btn-default btn-danger glyphicon glyphicon-arrow-up glyphicon-2x"></button>  
            </div>
                <div id="retour" class="alert"></div>
                
                <div class="row">
             
                     <?php foreach ($les_volets as $key => $module) { ?>
                        <div class="col-xs-4 col-sm-2 col-md-2" >
                         
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

         </div>

     </div>

   <script type="text/javascript" src="<?php echo js_url('myapp_simple') ?>"></script>
   <?php $this->load->view('include/footer_volet'); ?>
