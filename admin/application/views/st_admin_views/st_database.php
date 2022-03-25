<div class="container-fluid">
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="border-bottom: <?php if (isset($table) and $table=="liste_evalue") { echo "5px"; }else{ echo "0px"; } ?> solid #4e73df">
                <div class="card-body">
                    <a href="<?php echo base_url(); ?>index.php/database.html/liste_evalue" class="row no-gutters align-items-center">
						<div class="col mr-1">
                         	<i class=" fa fa-database"></i>
                        </div>
                        <div class="col-auto">
                            <span><strong><i>Table liste à evalue</i></strong></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border-bottom: <?php if (isset($table) and $table=="datas_uns") { echo "5px"; }else{ echo "0px"; } ?> solid #1cc88a">
                <div class="card-body">
                    <a href="<?php echo base_url(); ?>index.php/database.html/datas_uns" class="row no-gutters align-items-center">
                        <div class="col mr-2">
                         	<i class=" fa fa-database"></i>
                        </div>
                        <div class="col-auto">
                            <span><strong><i>Table stockage de donne</i></strong></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    	<?php 
    		if (isset($table)) {
    			$layout = 'application/views/include/';
    			include_once $layout."table_".$table.".php";
    		}
    	?>
    </div>
</div>