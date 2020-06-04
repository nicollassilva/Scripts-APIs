setTimeout(function() {
    $('[data-bbcode]').click(function(){

        var bbcode = $(this),
            before = bbcode.attr('data-bbcode-before'),
            after = bbcode.attr('data-bbcode-after'),
            expression = bbcode.attr('data-bbcode-el'),
            type = bbcode.attr('data-type');
    
        if(type !== undefined) {
    
            $('.'+expression).not('.'+expression+'#'+type).slideUp();
            $('.'+expression+'#'+type).slideToggle();
    
        } else {
    
            var element = $(expression),
                eLength = element.val().length,
                eStart = element[0].selectionStart,
                eEnd = element[0].selectionEnd,
                eString = element.val().substring(eStart, eEnd),
                eOp = before + eString + after;
            element.val(element.val().substring(0, eStart) + eOp + element.val().substring(eEnd, eLength)).focus();
        }
    });
}, 1);
