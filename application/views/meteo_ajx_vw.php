 <?php $this->load->view('include/entete'); ?>
<A href="#"  id="test2">Test Ajax</A>`


    <div id='tplt'>
    {{#meteo_data}}
    
 
    <div class="col-xs-12 col-md-3">        
        
     <div id="bandeau>">
       Ville :  {{meteo_data.city.name}}
    </div>
    <div id="temp_list">
        {{#list}}
        
       {{/list}}
    
    </div>
    
 </div>
 {{/meteo_data}} 
</div>
    
<?php $this->load->view('include/footer'); ?>