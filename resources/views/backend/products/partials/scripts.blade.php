

<script>
$(document).ready(function(){
    $('#name').focus();

    
    //Status Checkbox
    var status = $('#status').val();
    if (status == 1)
        $('#status').bootstrapSwitch('state', true);
    else
        $('#status').bootstrapSwitch('state', false);
        
    $('.statusCheckbox').on('switchChange.bootstrapSwitch', function (event, state) {
        if (state == true)
            $('#status').val('1');
        else
            $('#status').val('0');
    });

    $('form').keyup(function(e){
        if (e.which != 13) {
            if ($('#'+e.target.id).parent().hasClass('has-error')) {
                $('.help-box').remove();
                $('#'+e.target.id).parent().removeClass('has-error');
            }
        }
    });

            return true;
        
    });
</script>