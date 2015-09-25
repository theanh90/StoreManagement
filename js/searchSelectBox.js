

(function( $ ) {
    $.widget( "custom.combobox", {
        _create: function() {
            this.wrapper = $( "<span>" )
                .addClass( "custom-combobox" )
                .insertAfter( this.element );

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
        },

_createAutocomplete: function() {
    var selected = this.element.children( ":selected" ),
    value = selected.val() ? selected.text() : "";

    this.input = $( "<input>" )
    .appendTo( this.wrapper )
    .val( value )
    .attr( "title", "" )
    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
    .autocomplete({
    delay: 0,
    minLength: 0,
    source: $.proxy( this, "_source" )
    })
.tooltip({
    tooltipClass: "ui-state-highlight"
    });

this._on( this.input, {
    autocompleteselect: function( event, ui ) {
    ui.item.option.selected = true;
    this._trigger( "select", event, {
    item: ui.item.option
    });
},

autocompletechange: "_removeIfInvalid"
});
},

_createShowAllButton: function() {
    var input = this.input,
    wasOpen = false;

    $( "<a>" )
    .attr( "tabIndex", -1 )
    .attr( "title", "Hiện tất cả lựa chọn" )
    .tooltip()
    .appendTo( this.wrapper )
    .button({
    icons: {
    primary: "ui-icon-triangle-1-s"
    },
text: false
})
.removeClass( "ui-corner-all" )
.addClass( "custom-combobox-toggle ui-corner-right" )
.mousedown(function() {
    wasOpen = input.autocomplete( "widget" ).is( ":visible" );
    })
.click(function() {
    input.focus();

    // Close if already visible
    if ( wasOpen ) {
    return;
    }

// Pass empty string as value to search for, displaying all results
input.autocomplete( "search", "" );
});
},

_source: function( request, response ) {
    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
    response( this.element.children( "option" ).map(function() {
    var text = $( this ).text();
    if ( this.value && ( !request.term || matcher.test(text) ) )
    return {
    label: text,
    value: text,
    option: this
    };
}) );
},

_removeIfInvalid: function( event, ui ) {

    // Selected an item, nothing to do
    if ( ui.item ) {
    return;
    }

// Search for a match (case-insensitive)
var value = this.input.val(),
valueLowerCase = value.toLowerCase(),
valid = false;
this.element.children( "option" ).each(function() {
    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
    this.selected = valid = true;
    return false;
    }
});

// Found a match, nothing to do
if ( valid ) {
    return;
    }

// Remove invalid value
this.input
.val( "" )
.attr( "title", value + "Dữ liệu nhập vào không khớp" )
.tooltip( "open" );
this.element.val( "" );
this._delay(function() {
    this.input.tooltip( "close" ).attr( "title", "" );
    }, 2500 );
this.input.data( "ui-autocomplete" ).term = "";
},

_destroy: function() {
    this.wrapper.remove();
    this.element.show();
    }
});
})( jQuery );

$(function() {
    $( ".combobox" ).combobox();
    $( ".toggle" ).click(function() {
    $( ".combobox" ).toggle();
    });
});


/*==========  popup trang web   ============*/
function popup(url,w,h)
{
    var width  = 500;
    var height = 200;
    if (w != undefined) {
        width = w;
    }
    if (h != undefined) {
        height = h;
    }
    var left   = (screen.width  - width)/2;
    var top    = (screen.height - height)/2;
    var params = 'width='+width+', height='+height;
    params += ', top='+top+', left='+left;
    params += ', directories=no';
    params += ', location=no';
    params += ', menubar=no';
    params += ', resizable=no';
    params += ', scrollbars=no';
    params += ', status=no';
    params += ', toolbar=no';
    newwin=window.open(url,'windowname5', params);
    if (window.focus) {newwin.focus()}
    return false;
}

function closeDialogCustom() {
    window.opener.location.reload();
    window.close();
}

//=====================
function change_number_format(number){
    //   alert(number);
    number = number+"";// change it to string
    var output="";
    for (var i = number.length - 1; i >= 0; i--){

        output = number[i] + output;
        if ((number.length - i) % 3 == 0 &&  i > 0 ) {
            output = "." + output;
        }

    }
    output += " Đ";
    return output;
}

function mess_alert (mess, type, title, goto){
    BootstrapDialog.show({
        type: type,
        title: title,
        message: mess,
        closable: false,
        closeByBackdrop: false,
        closeByKeyboard: false,
        buttons: [{
            label: 'Đồng ý',
            action: function(dialogRef){
                dialogRef.close();
                if (goto) {
                    document.location = goto;
                }
            }
        }]

    });
}






