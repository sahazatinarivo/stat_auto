<div class="container-fluid">
    <div class="retour">
        <button type="button" class="btn btn-primary btn-sm" onclick = "history.back()"><i class="fa fa-reply"></i> Retour</button>
        <button type="button" class="btn btn-success btn-sm save-tableau"><i class="fa fa-save"></i> Sauvegarder le tableau</button>
    </div><hr>
    <div class="row block-btn-ajout-table">
        <div class="col-md-5 block-colonne">
            <h4><i><u>Ligne</u></i></h4>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="text-center middle-align" width="45%">Libelle</th>
                    </tr>
                </thead>
                <tbody class="block-html-lgn">
                    <?php foreach ($stbl as $stbls => $s) {  ?>
                    <?php for ($i=0; $i < (int)$s->nbr_lgn ; $i++) { ?>
                    <tr>
                        <td class="text-left text-justify-left">
                            <div class="field-cnt">
                                <input type="text" class="form-control input_save_ligne">
                            </div>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-7 block-colonne">
            <h4><i><u>Colonne</u></i></h4>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="text-center middle-align" width="35%">Libelle</th>
                        <th class="text-center middle-align" width="35%">Degre</th>
                    </tr>
                </thead>
                <tbody class="block-html-cln">
                    <?php foreach ($stbl as $stbls => $s) {  ?>
                    <?php for ($i=0; $i < (int)$s->nbr_cln ; $i++) { ?>
                    <tr>
                        <td class="text-left text-justify-left">
                            <div class="field-cnt">
                                <input type="text" class="form-control input_save_colonne" id="input_sv_cln_<?php echo $i; ?>">
                            </div>
                        </td>
                        <td class="text-center text-justify-left">
                            <div class="field-cnt">
                                <select class="form-control select_save_degre" id="select_sv_cln_<?php echo $i; ?>">
                                    <option value="">-----------------select degré------------</option>
                                    <?php foreach ($ldgr as $ldgrs => $l) { ?>
                                    <option value="<?php echo $l->id ?>"><?php echo $l->nom_degre ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>