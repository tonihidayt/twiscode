<script>
/**
 * Place any jQuery/helper plugins in here.
 */
$(function(){
    /**
     * CSRF token
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $('.loader').hide();

    /**
     * Bind all bootstrap tooltips
     */
    $("[data-toggle=\"tooltip\"]").tooltip();

    /**
     * Bind all bootstrap popovers
     */
    $("[data-toggle=\"popover\"]").popover();

    /**
     * This closes the popover when its clicked away from
     */
    $('body').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    /**
     * Notification
     */
    var App = {};
    App.notify = {
        message: function(message, type){
            if ($.isArray(message)) {
                $.each(message, function(i, item){
                    App.notify.message(item, type);
                });
            } else {
                $.bootstrapGrowl(message, {
                    type: type,
                    delay: 3000,
                    align: 'center',
                    width: 'auto',
                    height: '20px',
                    allow_dismiss: false
                });
            }
        },

        danger: function(message){
            App.notify.message(message, 'danger');
        },
        success: function(message){
            App.notify.message(message, 'success');
        },
        info: function(message){
            App.notify.message(message, 'info');
        },
        warning: function(message){
            App.notify.message(message, 'warning');
        },
        validationError: function(errors){
            $.each(errors, function(i, fieldErrors){
                App.notify.danger(fieldErrors);
            });
        }
    };

    /**
     * Detect and Post Sortable Item
     */
    var changePosition = function(requestData){
        $.ajax({
            'url': '{{ route("backend.sort") }}',
            'type': 'POST',
            'data': requestData,
            'success': function(data) {
                if (data.success) {
                    console.log('Saved!');
                    App.notify.success('Saved!');
                } else {
                    console.error(data.errors);
                    App.notify.validationError(data.errors);
                }
            },
            'error': function(){
                console.error('Something wrong!');
                App.notify.danger('Something wrong!');
            }
        });
    };

    var $sortableTable = $('.sortable');
        if ($sortableTable.length > 0) {
            $sortableTable.sortable({
                handle: '.sortable-handle',
                axis: 'y',
                update: function(a, b){

                    var entityName = $(this).data('entityname');
                    var $sorted = b.item;

                    var $previous = $sorted.prev();
                    var $next = $sorted.next();

                    if ($previous.length > 0) {
                        changePosition({
                            parentId: $sorted.data('parentid'),
                            type: 'moveAfter',
                            entityName: entityName,
                            id: $sorted.data('itemid'),
                            positionEntityId: $previous.data('itemid')
                        });
                    } else if ($next.length > 0) {
                        changePosition({
                            parentId: $sorted.data('parentid'),
                            type: 'moveBefore',
                            entityName: entityName,
                            id: $sorted.data('itemid'),
                            positionEntityId: $next.data('itemid')
                        });
                    } else {
                        console.error('Something wrong!');
                    }
                },
                cursor: "move"
            });
        };
    
    /**
     * iCheck
     */
    $('.icheckbox').each(function( index ) {
        $(this).iCheck({checkboxClass: 'icheckbox_flat-blue'});
        var value = $(this).val();
        if (value == 1)
            $(this).iCheck('check');
        else
            $(this).iCheck('uncheck');
    });
    $('.icheckbox').on('ifChecked', function(event){
      $(this).closest("input").val('1'); 
    });
    $('.icheckbox').on('ifUnchecked', function(event){
      $(this).closest("input").val('0'); 
    });

    /**
     * Set Active Menu
     */
    var newUrl = window.location.origin;
    var pathName = window.location.pathname;
    var sidebar_url = newUrl + pathName;
    $('.sidebar-menu a[href="'+ sidebar_url +'"]').parent().addClass('active');
    $('.sidebar-menu a[href="'+ sidebar_url +'"]').closest('.treeview').addClass('active');
    $('.sidebar-menu a[href="'+ sidebar_url +'"]').closest('.menumain').addClass('active');
    var pathArray = pathName.split( '/' );
    var newPathname = "";

    for (i = 0; i < pathArray.length; i++) {
        if (pathArray[i] == 'edit' || pathArray[i] == 'create' || pathArray[i] == 'view' || pathArray[i] == 'logs' || pathArray[i] == 'config' ) {
            var newUrl = window.location.origin + newPathname;
            $('.sidebar-menu a[href="'+ newUrl +'"]').parent().addClass('active');
            $('.sidebar-menu a[href="'+ newUrl +'"]').closest('.treeview').addClass('active');
            $('.sidebar-menu a[href="'+ newUrl +'"]').closest('.menumain').addClass('active');
            return false;
        } else {
            if (i != 0) {
                newPathname += "/";
            }
            newPathname += pathArray[i];
        }
    }
    $.genSWAL();
});

$.extend({
    genSWAL : function() {
        $('[data-method]').each(function() {
            var method_name = $(this)[0]['dataset']['method'];
            switch (method_name) {
                case 'delete': {
                    $(this).click(function(){$.openSWAL($(this), 'delete')});
                    break;
                }
                case 'status': {
                    $('[type=checkbox]', this).bootstrapSwitch({
                        onSwitchChange: function() {
                            var datadefault = $(this).attr('data-default');
                            var ischecked = ($(this).prop('checked')) ? 1 : 0;
                            if (datadefault != ischecked) $.openSWAL($(this), 'status');
                        }
                    });
                    break;
                }
            }
        });
    },
    openSWAL : function(method_this, method_name) {
        var cancel = ($(method_this).attr('data-trans-button-cancel')) ? $(method_this).attr('data-trans-button-cancel') : "Cancel";
        var confirm = ($(method_this).attr('data-trans-button-confirm')) ? $(method_this).attr('data-trans-button-confirm') : "Yes, delete";
        var title = ($(method_this).attr('data-trans-title')) ? $(method_this).attr('data-trans-title') : "Warning";
        var text = ($(method_this).attr('data-trans-text')) ? $(method_this).attr('data-trans-text') : "Please confirm";
        var color = ($(method_this).attr('data-color')) ? $(method_this).attr('data-color') : "#5cb85c";
        var url = $(method_this).attr('data-url');

        swal({
            title: title,
            text: text,
            type: "question",
            showCancelButton: true,
            cancelButtonText: cancel,
            confirmButtonColor: color,
            confirmButtonText: confirm,
            confirmButtonClass: 'btn btn-success',
            showLoaderOnConfirm: true,
        }).then(function() {
            if (method_name == 'status') method_name = 'patch';
            $('<form action="' + url + '" method="POST" name="' + method_name + '_item" style="display:none"><input type="hidden" name="_method" value="' + method_name + '""><input type="hidden" name="_token" value="' + $('meta[name="_token"]').attr('content') + '"></form>').appendTo('body').submit();
        }, function() {
            if (method_name == 'status') $(method_this).bootstrapSwitch('toggleState');
        }).done();
    }
});
</script>