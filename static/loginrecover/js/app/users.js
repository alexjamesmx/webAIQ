let pathArray = window.location.pathname.split('/');
let dummyIcon = '';
let dummyTitle = '';
let dummyContent = '';
jQuery(document).ready(function($) {
    dummyTitle = $('#users-section-title').html();
    dummyContent = $('#users-section-container').html();

    loadSettingsSection(pathArray[3]);
});

function loadSettingsSection(uri) {
    $('#users-section-title').html(dummyTitle);
    $('#users-section-container').html(dummyContent);

    $('#users-section-container').load(base_url(`app/users/sectiondata/${uri}`),{
        uri: uri} ,
        () => {
            $('.users-menu-items').removeClass('active');
            $('.mobile-users-menu').removeClass('bg-light');

            $(`.users-menu-${uri}`).addClass('active');
            $(`.users-menu-${uri}`).addClass('bg-light');
            $('#users-section-title').html($(`.users-menu-${uri}`).attr('users-section-title'));
        });
}

function updateAdressBar(uri) {
    window.history.pushState({}, '', `${uri}`);
    loadSettingsSection(uri);
}
