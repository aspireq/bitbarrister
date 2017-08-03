$(document).ready(function () {
    h = $(window).height();
    $('#content-wrapper').css("min-height", h);
    var url = window.location.href;
    $('#sidebar-nav ul li').each(function () {
        if ($(this).find('a').attr('href') == url)
        {
            $(this).addClass('active');
            return false;
        }
    });
});