<?php $this->load->view('include/entete'); ?>
</div>  <!--  close hedaer -->

<div id="weather">
	
	<div class="your-clock"></div>
	
</div>
	<pre>
		<h2><a href="#" id="test"></a></h2>
		<h3>
			<?php echo (
				    'Ville: '.$ville.'<br>'.
				    'pression :'.$pressure.'<br>'.
				    'temp: '.$temp.'<br>'.
				    'humidity: '.$humidity.'<br>'.
				    'date: '.$date
				    
			) ?>
		</h3>
	<?php var_dump($meteo); ?>
	</pre>



 <?php $this->load->view('include/footer'); ?>