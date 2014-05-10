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

<A href="#"  id="meteo">Test Ajax</A>`


    <div id='tplt'>
    {{#block_data}}
    
 
    <div class="col-xs-12 col-md-3">        
        
     <div id="bandeau>">
       Ville :  {{block_data.city.name}}
       compteur : {{block_data.cnt}}
    </div>
    <div id="temp_list">
        {{#list}}
          dt : {{list.dt}}
          {{#list.clouds}}
            "=> " {{.}}
           {{/list.clouds}}
       {{/list}}
    
    </div>
    
 </div>
 {{/block_data}} 
</div>
    
<?php $this->load->view('include/footer'); ?>