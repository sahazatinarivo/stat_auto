$(document).ready(function() {
    var _vPrms = models.params.getParams("cle_ws");
    if (_vPrms.count == 0) {
        templates.display('st_params.html');
    }else{
        templates.display('st_login.html');
    }
    
    // Air maximize window
    if (window.nativeWindow.displayState != 'maximized')
        window.nativeWindow.maximize();

    $('#megadiv').on('click', 'a.btn_close_popup', function(e) {
        $('.pop_Error').hide();
    });
    
    $('#megadiv').on('click', 'a.btn_error_ok', function() {
        session.clear();
        templates.display('st_params.html');
    });

    $("body").on("click", ".btn_sicron_ok", function(event) {
        templates.display('cnt_index.html');
        $('.pop_Error_sincro').remove();
    });
    $("body").on("click", ".btn_sicron_cancel", function(event) {
        $('.pop_Error_sincro').remove();
    });
    
    /* CHECKING DATA TYPE */
    $("body").on("keyup", ".input-date", function() {
        var $thisInput = $(this), _idThis = $thisInput.attr('id');
        services.dataFormat.date( _idThis );
    });
    $("body").on("keyup", ".input-numeric", function() {
        var $thisInput = $(this), _idThis = $thisInput.attr('id');
        services.dataFormat.numeric( _idThis );
    });
    $("body").on("keyup", ".input-montant", function() {
        var $thisInput = $(this), _idThis = $thisInput.attr('id');
        services.dataFormat.montant( _idThis );
    });
    /* CHECKING DATA TYPE */
        
});