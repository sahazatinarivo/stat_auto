<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tableau-bord.html'] = "accueil/index";
$route['database.html/(:any)'] = "import/database/$1"; 
$route['ajout_champ'] = "import/index";
$route['import-donne.html'] = "import/import";
$route['creation_table'] = "import/create_table";
$route['save_table'] = "import/save_table";
$route['drop_column_table'] = "import/drop_column_table";
$route['edite_table'] = "import/edite_table";
$route['edite_table_datas'] = "import/edite_table_datas";
$route['save_modif_table'] = "import/save_modif_table";
$route['run_import_donne'] = "import/run_import_donne";
$route['modal_import'] = "import/modal_import";
$route['init_table'] = "import/init_table";

/*creation*/
$route['creation-list.html'] = "creation/create_list";
$route['creation-page.html'] = "creation/create_page";
$route['creation-blck.html'] = "creation/create_bloc";
$route['creation-chmp.html'] = "creation/create_chmp";
$route['chg_pg'] = "creation/change_page";
$route['chg_champ_pg'] = "creation/change_champ_page";

/*save liste*/
$route['save_liste'] = "creation/save_liste";
$route['delete_liste'] = "creation/delete_liste";
$route['edite_liste'] = "creation/edite_liste";
$route['detail_liste'] = "creation/detail_liste";
$route['save_liste_l'] = "creation/save_liste_l";
$route['edite_listel'] = "creation/edite_listel";
$route['delete_listel'] = "creation/delete_listel";

/*creation page*/
$route['save_page'] = "creation/save_page";
$route['suppr_page'] = "creation/suppr_page";
$route['edite_page'] = "creation/edite_page";
/*creation block*/
$route['save_block'] = "creation/save_block";
$route['edite_block'] = "creation/edite_block";
$route['suppr_block'] = "creation/suppr_block";
$route['type_block'] = "creation/type_block";

/*creation champ*/
$route['save_champ'] = "creation/save_champ";
$route['edite_champ'] = "creation/edite_champ";
$route['suppr_champ'] = "creation/suppr_champ";
/*generer table*/
$route['generer-block.html'] = "montage/generer_tableau";
$route['params-block.html'] = "montage/params_block";
$route['save_html'] = "montage/save_html";
$route['save_ordre'] = "montage/save_ordre";
/*export db*/
$route['export-donne.html'] = "export/donne";
$route['stat-tableau.html'] = "export/stat";
$route['export_donne'] = "export/excelData";
$route['export_stat'] = "export/excelStat";
$route['stat-graph.html'] = "export/stat_graph";

/*users*/
$route['login.html'] = "users/index";
$route['connecter-admin.html'] = "users/connecter_admin";
$route['user-admin.html'] = "users/admin";
$route['user-operat.html'] = "users/operateur";
$route['ajout-operateur.html'] = "users/add_operateur";
$route['ajout-admin.html'] = "users/add_admin";
$route['edit-nom-admin-(:any).html'] = "users/edit_nom_a/$1";
$route['edit-mdps-admin-(:any).html'] = "users/edit_mdps_a/$1";
$route['save_operat'] = "users/save_operat";
$route['save_admin'] = "users/save_admin";
$route['suppr_operat'] = "users/suppr_operat";
$route['suppr_admin'] = "users/suppr_admin";
$route['deconnexion'] = "users/deconnexion";

/*parametre*/
$route['theme.html'] = "setting/theme";
$route['logo1'] = "setting/logo1";
$route['logo2'] = "setting/logo2";
$route['save_setting'] = "setting/save_setting";
$route['autre-setting.html'] = "setting/autre_setting";
$route['params_recherche'] = "setting/params_recherche";
$route['params_stockage'] = "setting/params_stockage";
$route['save_searche'] = "setting/save_searche";
$route['save_stock'] = "setting/save_stock";

/*saisie*/
$route['etat-saisie.html'] = "saisie/etat_saisie";
$route['controle-saisie.html'] = "saisie/controle";

/*wservice*/
$route['lien-ws.html'] = "WService/envoiLien";
$route['get-acount.html'] = "WService/getAcount";
$route['synchr-table-liste.html'] = "WService/tableListe";
$route['synchr-table-donne.html'] = "WService/tableDonne";
$route['synchr-params-couleur.html'] = "WService/getParamsTheme";
$route['synchr-params-colonne.html'] = "WService/getParamsColonne";
$route['synchr-donne-liste.html'] = "WService/donneListe";
$route['synchr-params-searche.html'] = "WService/paramsSearch";
$route['synchr-code-html.html'] = "WService/codeHtml";
$route['envoi-donne-saisie.html'] = "WService/envoiData";