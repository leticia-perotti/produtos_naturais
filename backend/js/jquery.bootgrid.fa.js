/*!
 * jQuery Bootgrid v1.3.1 - 09/11/2015
 * Extensão para FontAwesome 5, Tradução Português, Bootstrap 4
 * Copyright (c) 2014-2015 Rafael Staib (http://www.jquery-bootgrid.com)
 * Licensed under MIT http://www.opensource.org/licenses/MIT
 */
;(function ($, window, undefined)
{
    /*jshint validthis: true */
    "use strict";

    $.extend($.fn.bootgrid.Constructor.defaults.css, {
        icon: "icon fas",
        iconColumns: "fa-th-list",
        iconDown: "fa-sort-down",
        iconRefresh: "fa-sync",
        iconSearch: "fa-search",
        iconUp: "fa-sort-up",
        paginationButton: "page-link",
        search: "search input-group"
    });
    $.extend($.fn.bootgrid.Constructor.defaults.labels, {
        all: "Todos",
        infos: "Exibindo \{\{ctx.start\}\} até \{\{ctx.end\}\} de \{\{ctx.total\}\}",
        loading: "Carregando...",
        noResults: "Resultados não encontrados!",
        refresh: "Recarregar",
        search: "Buscar"
    });
    $.extend($.fn.bootgrid.Constructor.defaults.templates, {
        search: "<div class=\"{{css.search}}\"><div class=\"input-group-prepend\"><span class=\"input-group-text \"><i class=\"{{css.icon}} {{css.iconSearch}}\"></i></span> <input type=\"text\" class=\"{{css.searchField}}\" placeholder=\"{{lbl.search}}\" /></div></div>",
    });

})(jQuery, window);
