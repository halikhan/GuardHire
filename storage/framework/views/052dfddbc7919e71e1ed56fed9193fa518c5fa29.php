<?php
$getCopyrights = App\Models\Config::where('id','1')->first();

// dd($logo_add);
?>

<footer class="footer">
	  <div class="container-fluid">
		    <div class="row">
			      
                  
                  <div class="col-md-12 footer-copyright text-center">
                      <span><?php echo e($getCopyrights->configuration); ?></span>
                      <br />
                      Design & Development by<a href="https://designprosusa.com/" target="_blank"> Design Pros
                          USA</a>
                  </div>
                  
		    </div>
	  </div>
</footer>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/layouts/simple/footer.blade.php ENDPATH**/ ?>