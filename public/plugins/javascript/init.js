$(document).ready(function () {
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
        constrainWidth: false,
    });
    $('.modal').modal();
    $('.tabs').tabs();
    $('.datepicker').datepicker({
        autoClose: true,
        format: 'yyyy/mm/dd'
    });
    $('.timepicker').timepicker({
        autoClose: true
    });
    $('select').formSelect();
    $('.lazy').lazy();
})
