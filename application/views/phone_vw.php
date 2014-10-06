 <?php $this->load->view('include/entete_phone'); ?>

<header class="bar bar-nav">
  <button class="btn pull-left">
    Left
  </button>
  <button class="btn pull-right">
    Right
  </button>
  <h1 class="title">Title</h1>
</header>

<div class="content" >
      <div ng-view></div>

 </div>

<?php $this->load->view('include/footer_phone'); ?>

