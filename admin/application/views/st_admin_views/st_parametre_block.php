<div class="container-fluid params-block" style="background-color: white; padding: 20px">
    <form method="get">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <select class="form-control" name="{num_page}" required="required">
                <option value="">---------Selectionner pages-----</option>
                <?php if (isset($page)) { ?>
	                <?php foreach ($page as $pages => $p) {?>
	                <option value="<?php echo $p->id ?>" 
	                <?php if (isset($idpg) and $idpg == $p->id) echo "selected"; ?>>
	                    <?php echo $p->nom_page; ?>
	                </option>
	                <?php } ?>
            	<?php } ?>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Afficher</button>
        </div>
        <div class="col-md-3"></div>
    </div><br>
    </form>
    <div class="container-fluid" id="contenue-html-mask">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center" width="10%">N°</th>
                    <th class="text-center" width="60%">Nom/libelle</th>
                    <th class="text-center" width="10%">Page</th>
                    <th class="text-center" width="10%">Type</th>
                    <th class="text-center" width="10%">Ordre</th>
                    <th class="text-center" width="10%">Action</th>
                 </tr>
            </thead>

            <tbody class="block-html-cln">
            	<?php if(isset($html)){ $i=0; ?>
           		<?php foreach($html as $htmls => $h){ $i++; ?>
                <tr>
                	<td class="text-center"><span class="span-num-list"><?php echo $i; ?></span> </td>
                    <td><strong><i><?php echo $h->block; ?></i></strong></td>
                    <td class="text-center"><span class="span-num-list"><?php echo $h->page; ?></span> </td>
                    <td class="text-center"><strong><i><?php echo $h->type; ?></i></strong></td>
                    <td class="text-center" id="edit-ordre-<?php echo $h->id_html; ?>">
                    	<span class="span-num-list"><?php echo $h->ordre; ?></span>
                    </td>
                    <td class="field-cnt text-center">
                        <button type="button" id="btn-edit-ordre-<?php echo $h->id_html; ?>" value="<?php echo $h->ordre; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
            	<?php } ?>
            	<?php } ?>
            </tbody>
        </table>
    </div>
</div>