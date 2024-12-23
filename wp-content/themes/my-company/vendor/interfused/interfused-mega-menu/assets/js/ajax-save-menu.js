/**
 * Interfused.com
 *
 * $Template:: *(TEMPLATE_NAME)*
 * $Copyright:: *(COPYRIGHT)*
 * $Licence:: *(LICENCE)*
 */

 /*global jQuery: false, ajaxurl: false */

 /*!
  SerializeJSON jQuery plugin.
  https://github.com/marioizquierdo/jquery.serializeJSON
  version 2.0.0 (May, 2014)

  Copyright (c) 2014 Mario Izquierdo
  Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
  and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*/
(function(a){a.fn.serializeJSON=function(c){var d,b,g,i,h,e;h=a.serializeJSON;b=this.serializeArray();e=h.optsWithDefaults(c);d={};a.each(b,function(j,f){g=h.splitInputNameIntoKeysArray(f.name);i=h.parseValue(f.value,e);h.deepSet(d,g,i,e)});return d};a.serializeJSON={defaultOptions:{parseNumbers:false,parseBooleans:false,parseNulls:false,parseAll:false,useIntKeysAsArrayIndex:false},optsWithDefaults:function(c){var d,b;if(c==null){c={}}d=a.serializeJSON;b=d.optWithDefaults("parseAll",c);return{parseNumbers:b||d.optWithDefaults("parseNumbers",c),parseBooleans:b||d.optWithDefaults("parseBooleans",c),parseNulls:b||d.optWithDefaults("parseNulls",c),useIntKeysAsArrayIndex:d.optWithDefaults("useIntKeysAsArrayIndex",c)}},optWithDefaults:function(c,b){return(b[c]!==false)&&(b[c]||a.serializeJSON.defaultOptions[c])},parseValue:function(e,b){var d,c;c=a.serializeJSON;if(b.parseNumbers&&!isNaN(e)){return Number(e)}if(b.parseBooleans&&(e==="true"||e==="false")){return e==="true"}if(b.parseNulls&&e=="null"){return null}return e},isObject:function(b){return b===Object(b)},isUndefined:function(b){return b===void 0},isValidArrayIndex:function(b){return/^[0-9]+$/.test(String(b))},splitInputNameIntoKeysArray:function(b){var d,c,e;e=a.serializeJSON;if(e.isUndefined(b)){throw new Error("ArgumentError: param 'name' expected to be a string, found undefined")}d=a.map(b.split("["),function(f){c=f[f.length-1];return c==="]"?f.substring(0,f.length-1):f});if(d[0]===""){d.shift()}return d},deepSet:function(c,l,j,b){var k,h,g,i,d,e;if(b==null){b={}}e=a.serializeJSON;if(e.isUndefined(c)){throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined")}if(!l||l.length===0){throw new Error("ArgumentError: param 'keys' expected to be an array with least one element")}k=l[0];if(l.length===1){if(k===""){c.push(j)}else{c[k]=j}}else{h=l[1];if(k===""){i=c.length-1;d=c[i];if(e.isObject(d)&&(e.isUndefined(d[h])||l.length>2)){k=i}else{k=i+1}}if(e.isUndefined(c[k])){if(h===""){c[k]=[]}else{if(b.useIntKeysAsArrayIndex&&e.isValidArrayIndex(h)){c[k]=[]}else{c[k]={}}}}g=l.slice(1);e.deepSet(c[k],g,j,b)}}}}(window.jQuery||window.Zepto||window.$));

'use strict';
(function( $ ){
    $(document).ready(function($){
        $( '#update-nav-menu' ).on( 'submit', function( event ) {
            // make sure we are not making a new menu?
            if( parseInt( $( '#nav-menu-meta-object-id' ).val() ) !== 0 ) {
                // remove any existing messages
                $( '#message' ).remove();
                var saveMenuButtons = $( '.menu-save' );
                // disable save buttons
                saveMenuButtons.attr( 'disabled', true );
                saveMenuButtons.before( $( '<span class="spinner" style="float:left;margin: 5px 5px 0;"></span>' ).show() );
                // ok we are saving an existing menu so use ajax
                var serializedMenu = $( this ).serializeJSON();
                var jsonMenu = JSON.stringify( serializedMenu );
                console.log(jsonMenu);

                $.post( ajaxurl, {
                    action: 'pm_save_menu',
                    menu: jsonMenu
                }, 'json')
                .success( function( data ) {
                    for (var message = 0; message < data.messages.length; message++) {
                        $( '.manage-menus' ).after( $( data.messages[message] ) );
                    }
                    saveMenuButtons.prev( '.spinner' ).remove();
                    saveMenuButtons.attr( 'disabled', false );
                })
                .error( function( response ) {
                    $( '.manage-menus' ).after( $( '<div id="message" class="error"><p>Error could not save menu.</p></div>' ) );
                    saveMenuButtons.prev( '.spinner' ).remove();
                    saveMenuButtons.attr( 'disabled', false );
                });
                // prevent default php save
                event.preventDefault();
            }
        });
    });
})( jQuery );
