/**
 * Interfused.com
 *
 * $Template:: *(TEMPLATE_NAME)*
 * $Copyright:: *(COPYRIGHT)*
 * $Licence:: *(LICENCE)*
 */

 /*global jQuery: false */

'use strict';

(function($){
    $(document).ready(function($) {
        $('.pm-one-click-complete .toggle-details').click(function(e){
            $('#install-log').toggle();
            e.stopPropagation();
        })
    });
})(jQuery);