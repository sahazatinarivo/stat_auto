<?php $i=0; ?>
<?php foreach ($cl as $cls => $l) {?>
<?php $i++ ?>
<tr>
    <td><span class="span-num-list"><?php echo $i; ?></span></td>
    <td class="text-left"><strong><i><?php echo isset($l) ? $l->libelle:""; ?></i></strong></td>
    <td>
        <strong><i>      
            <?php 
                if ((int)$l->etat == 0) {
                    echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
                }else{
                    echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
                }
            ?></i>
        </strong>
    </td>
    <td class="text-center">'
    	<button type="button" class="btn btn-primary btn-sm btn_action_creation" id="edite_listel_<?php echo isset($l) ? $l->id:""; ?>">
    		<i class="fa fa-edit"></i>
    	</button>
    	<button type="button" class="btn btn-danger btn-sm btn_action_creation" id="delete_listel_<?php echo isset($l) ? $l->id:""; ?>">
    		<i class="fa fa-trash"></i>
    	</button>
    </td>
</tr>
<?php } ?>