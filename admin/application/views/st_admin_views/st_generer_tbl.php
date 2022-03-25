<div class="container-fluid generer-table" style="background-color: white; padding: 20px">
    <form method="get">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <select class="form-control" name="{num_page}" required="required">
                <option value="">---------Selectionner pages-----</option>
                <?php foreach ($page as $pages => $p) {?>
                <option value="<?php echo $p->id ?>" 
                    <?php if (isset($n_pg) && $p->id == $n_pg) { echo "selected"; } ?>>
                    <?php echo $p->nom_page; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control block-select-block" name="{num_block}" required="required">
                <option value="">-------Selectionner block------</option>
                <?php foreach ($block as $blocks => $b) {?>
                <option value="<?php echo $b->id ?>" 
                    <?php if (isset($n_bc) && $b->id == $n_bc) { echo "selected"; } ?>>
                    <?php echo $b->nom_block; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Generer</button>
        </div>
        <div class="col-md-1"></div>
    </div><br>
    </form><hr>
          <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center middle-align" width="60%">Nom de block</th>
                    <th class="text-center middle-align" width="40%">Page</th>
                    <th class="text-center middle-align" width="20%">Action</th>
                </tr>
            </thead>
            <tbody class="block-html-cln">
                <?php if (isset($chtml)): ?>
                    <?php foreach ($chtml as $chtmls): ?>
                        <tr>
                            <td class="text-left text-justify-left"><i>&nbsp;<?php echo $chtmls->nom; ?></i></td>
                            <td class="text-left text-justify-left"><i>&nbsp;<?php echo $chtmls->page; ?></i></td>
                            <td class="text-center text-justify-left">
                                <a href="<?php echo base_url(); ?>index.php/generer-block.html?{num_page}=<?php echo $chtmls->idpg ?>&{num_block}=<?php echo $chtmls->idblock ?>" type="button" class="btn btn-info btn-sm">
                                    <i class="fa fa-sync-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    <div class="container-fluid" id="contenue-html-mask">
        <?php if (isset($_GET['{num_page}'])) {?>
        <?php if (isset($types) and $types==1) {?>
        <label>
        <?php foreach ($titre as $titres => $t) { echo "<h4><i><u>".$t->nom_block."</u></i></h1>"; } ?>
        </label>
        <table class="table table-striped table-bordered  ">
            <thead>
                <tr>
                    <th class="text-center middle-align" width="20%">Ligne \ Degré</th>
                    <?php foreach ($nmCln as $nmClns => $c) {?>
                    <?php 
                        $divC = 80/count($nmCln);
                    ?>
                    <th class="text-center middle-align" width="<?php echo $divC ?>%"><?php echo $c->nom_champ; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody class="block-html-cln">
                <?php foreach ($ligne as $lignes => $l) { ?>
                <tr>
                    <td class="text-left text-justify-left">
                        <span class="span-stock-array" id="[span][array][<?php echo $l->id; ?>]">
                            <?php $soq = "ligne,"; ?>
                            <?php foreach ($nmCln as $nmClns => $c) {?>
                            <?php 
                                $soq .= replace($c->nom_champ).",";
                            ?>
                            <?php }

                            echo $soq;
                            ?>
                        </span>
                        <div class="field-cnt">
                            <?php echo $l->libelle; ?>
                        </div>
                        <input type="hidden" id="[champ][<?php echo strtolower($l->id); ?>][ligne]" 
                        value="<?php echo "[".$l->id."]".replace($l->libelle); ?>"> 
                    </td>
                    <?php foreach ($nmCln as $nmClns => $c) {?>
                    <?php  
                        $liste = $this->db->from('st_liste_liste')
                                           ->where('id_liste', (int)$c->degre)
                                           ->where('etat',1)
                                           ->get()->result();
                    ?>
                    <?php if((int)$c->degre > 0){ ?>
                    <td class="text-left text-justify-left">
                        <select class="form-control text-center" id="[champ][<?php echo $l->id; ?>][<?php echo replace($c->nom_champ); ?>][<?php echo replace($l->libelle); ?>]">
                            <option value="0">----Select----</option>
                            <?php foreach ($liste as $listes => $c) {?>
                            <option value="<?php echo $c->libelle; ?>"><?php echo $c->libelle ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <?php }else{ ?>
                        <td class="text-left text-justify-left">
                            <input type="text" class="form-control" id="[champ][<?php echo $l->id; ?>][<?php echo replace($c->nom_champ); ?>][<?php echo replace($l->libelle); ?>]"> 
                        </td>
                    <?php } ?>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else if($types == 2){ ?>
            <?php foreach ($titre as $titres => $t) { ?>
            <div class="st-html-titre" style="  text-align: center;
                                                height: 50px;
                                                padding-top: 5px;
                                                width: 100%;
                                                background-color: #d7d7d7;
                                                color: gray;
                                                padding-top: 5px;
                                                font-size: 25px;">
                <strong><i><?php echo $t->nom_block; ?></i></strong>
            </div>
            <?php } ?>
        <?php }else if($types == 3){ ?>
            <?php foreach ($titre as $titres => $t) { ?>
            <div class="st-html-sous-titre">
                <span class="sous-titre"><h3><i><u><?php echo $t->nom_block; ?></u></i></h3></span>
            </div>
            <?php } ?>
        <?php }else{ ?>
        <?php } ?>
        <?php } ?>
    </div><hr>
    <input type="hidden" name="{stock_id_page}" value="<?php echo isset($n_pg)?$n_pg:"" ?>">
    <input type="hidden" name="{stock_id_bloc}" value="<?php echo isset($n_bc)?$n_bc:"" ?>">
    <button type="button" class="btn btn-success" id="save_code_html">Enregistrer le code HTML</button>
</div>