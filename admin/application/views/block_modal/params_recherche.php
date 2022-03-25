<form method="post" action="<?php echo base_url(); ?>index.php/save_searche">
    <table class="table table-striped table-bordered table-md">
        <thead>
            <tr>
                <th class="text-center" width="80%">Nom du colonne</th>
                <th class="text-center" width="20%">Colonne activer</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($nChamp)) {  ?>
            <?php foreach ($nChamp as $nChamps => $n): ?>
                <?php if ($n->Field!=="id" && $n->Field!=="slug"): ?>
                    <tr>
                        <td> <strong><i><?php echo ucfirst($n->Field); ?></i></strong></td>
                        <td class="text-center">
                            <input type="radio" name="cActiveRech" value="<?php echo $n->Field; ?>"  required="true" <?php if (isset($pActiv) and $n->Field == $pActiv) echo "checked='true'"; ?> >
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <button type="submit" class="btn btn-success save_params_recherche"><i class="fa fa-save"></i> Enregistrer le parametre</button>
</form>
