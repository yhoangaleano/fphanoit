<div class="container">
    <h2>You are in the View: application/views/home/example_two.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be a normal page.</p>
</div>
<?php 
	if($this->getSession("prueba")!=null){
		$this->destroySession("prueba");
	}
 ?>
