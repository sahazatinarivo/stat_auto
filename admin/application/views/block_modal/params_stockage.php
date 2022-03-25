<form>
    <table class="table table-striped table-bordered table-md">
        <thead>
            <tr>
                <th class="text-center" width="60%">Nom du colonne</th>
                <th class="text-center" width="40%">Liste correspondant</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($nChamp)): ?>
            <?php foreach ($nChamp as $nChamps => $n): ?>
                <?php if (isset($pStock)): ?>
                    <?php foreach ($pStock as $pStocks => $p): ?>
                        <?php if ($n->Field!=="id" && $n->Field!=="id_liste" && $n->Field!=="quest" && $n->Field!=="user_save" && $n->Field!=="user_update" && $n->Field!=="updated_at" && $n->Field!=="created_at"): ?>
                            <tr>
                                <td>
                                    <strong>
                                        <i><?php echo ucfirst($n->Field); ?></i>
                                        <input type="hidden" name="colonne_<?php echo $n->Field; ?>" value="<?php echo $n->Field; ?>">
                                    </strong>
                                </td>
                                <?php if (isset($cChamp)): ?>
                                <td class="text-center">
                                    <select class="form-control" name="valuec_<?php echo $n->Field; ?>">
                                        <option value="0">---Select---</option>
                                        <?php foreach ($cChamp as $cChamps => $c): ?>
                                        <option value="<?php echo $c->id ?>" <?php if($p->{$n->Field} == $c->id) echo "selected"; ?>><?php echo $c->nom_champ ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <?php endif ?>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
        <?php endif ?>
        </tbody>
    </table>
    <div id="message"></div>
    <br>
    <button type="button" class="btn btn-success save_params_stock" id="save_params_stock">
        <i class="fa fa-save"></i> Enregistrer le parametre
    </button>
</form>
