let pathArray = window.location.pathname.split('/');
let dummyIcon = '';
let dummyTitle = '';
let dummyContent = '';
jQuery(document).ready(function($) {
    dummyTitle = $('#settings-section-title').html();
    dummyContent = $('#settings-section-container').html();

    loadSettingsSection(pathArray[3]);
});

function loadSettingsSection(uri) {
    $('#settings-section-title').html(dummyTitle);
    $('#settings-section-container').html(dummyContent);

    $('#settings-section-container').load(base_url(`app/settings/sectiondata/${uri}`),{
        uri: uri} ,
        () => {
            $('.settings-menu-items').removeClass('active');
            $('.mobile-settings-menu').removeClass('bg-light');

            $(`.settings-menu-${uri}`).addClass('active');
            $(`.settings-menu-${uri}`).addClass('bg-light');
            $('#settings-section-title').html($(`.settings-menu-${uri}`).attr('settings-section-title'));
        });
}

function updateAdressBar(uri) {
    window.history.pushState({}, '', `${uri}`);
    loadSettingsSection(uri);
}
