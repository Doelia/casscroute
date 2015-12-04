$(function() {


    // Activation des tooltips
    $('.ttip.cl').popup({on: 'click'});

    // Activation des tooltips
    $('.ttip.ncl').popup();

    // Menus déroulants
    $('.ui.dropdown').dropdown();

    // Boutons "Retour"
    $('.button.back').click(function() {
        javascript:history.back();
    });

    // Petite croix pour fermer les messages
    $('.message .close').on('click', function() {
        $(this)
            .closest('.message')
            .transition('fade');
    });
});
