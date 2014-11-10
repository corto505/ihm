 <?php $this->load->view('include/entete'); ?>

<div class="content" ng-controller="ctrlStates">
     <div class="row">
         <div class="btn-group">
             <button class="btn btn-success btn-lg" ng:click="send_cde_stat('short')"> Court</button>
             <button class="btn btn-success btn-lg" ng:click="send_cde_stat('heure')"> Heure</button>
             <button class="btn btn-success btn-lg" ng:click="send_cde_stat('jour')"> Jour</button>
             <button class="btn btn-success btn-lg" ng:click="send_cde_stat('mois')"> Mois</button>
             <button class="btn btn-success btn-lg" ng:click="send_cde_stat('semaine')"> Semaine</button>
             <button class="btn btn-warning btn-lg" ng:click="send_cde_stat('gpio')"> GPIO</button>
             <button class="btn btn-warning btn-lg" ng:click="send_cde_stat('dd')"> DD</button>
         </div>
    </div>
    <div class="row">
       <div class="stat">  
       {{data}} 
            <pre class="bg-primary">{{lameteo}}</pre>   
       </div>
    </div>
</div>

<?php $this->load->view('include/footer'); ?>