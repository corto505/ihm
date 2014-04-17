 <?php $this->load->view('include/entete'); ?>
<A href="#"  id="test2">Test Ajax</A>`


    <div id='tplt'>
    {{#tuto}}
    {{#piece}}
    <div class="col-xs-12 col-md-3">        
        <div class="inter">
            <div class="bandeau">
                <span> {{piece}} - {{type_module}} </span>
            </div>
            <div class="content">
                {{code}}
                <div class="bouttons">
                    <button class="bnt btn-success btn-lg" type="button">On</button><br><br>
                    <button class="bnt btn-danger btn-lg" type="button">Off</button>
                </div>
            </div>
            <div class="footer">
                <span>info : {{nom}} </span>
            </div>
        </div>
            
     </div>
       {{/piece}}
     {{/tuto}} 
 </div>


<?php $this->load->view('include/footer'); ?>