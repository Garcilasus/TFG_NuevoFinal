(function ()
{
    var documElem = $(document), menu = $("nav"), ultimoTopScroll = 0;

    documElem.on("scroll", function ()
    {
        var topScrollActual = $(this).scrollTop();
        //bajar
        if (topScrollActual > ultimoTopScroll)
        {
            menu.addClass("hidden");
        }
        //subir
        else
        {
            menu.removeClass("hidden");
        }

        ultimoTopScroll = topScrollActual;
        
    });
})();