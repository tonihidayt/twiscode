<script src="{{ url('/js/password-strength-meter/password.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $('#username').focus();

    passwordScore = 0;
    $('#password').password({
        shortPass: " Password Too Short",
        badPass: " Bad Password",
        goodPass: " Good Password",
        strongPass: " Strong Password",
        containsUsername: " Password Contains Username",
        enterPass: "{{ trans('Enter Password') }}",
        showPercent: true,
        showText: true,
        animate: true,
        animateSpeed: 'slow',
        username: false,
        usernamePartialMatch: true,
        minimumLength: 8
    }).on('password.score', (e, score) => {passwordScore = score});

    $('.password-eye').click(function() {
        if ($(this).children().hasClass('glyphicon-eye-close')) {
            $(this).children().removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
            $('#password').attr('type', 'text');
            $('#password_confirmation').attr('type', 'text');
        } else {
            $(this).children().removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
            $('#password').attr('type', 'password');
            $('#password_confirmation').attr('type', 'password');
        }
    });
 //   $("[name='signature']").summernote({ height: 300 });

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

    $.extend({
        checkForm: function() {
            $('.help-box').remove();
            $('.has-error').removeClass('has-error');
            if (!$('#username').val()) {
                $('#username').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.fill_username') }}</span>")
                return false;
            }
            if ($('#username').val().length < 4) {
                $('#username').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.min_4_chars') }}</span>")
                return false;
            }

            if (($('#edit_staff').val() === undefined) && (!$('#username').is(':focus')) && (!$('#password').val())) {
                $('#password').focus().parent().addClass('has-error').parent().append("<span class='help-box text-danger'>{{ trans('alerts.users.fill_password') }}</span>");
                return false;
            } else if ($('#username').is(':focus')) {
                $('#password').focus();
                return false;
            }

            if (($('#edit_staff').val() === undefined) && (passwordScore != 100)) {
                $('#password').focus();
                return false;
            }

            if (($('#edit_staff').val() === undefined) && (!$('#password').is(':focus')) && (!$('#password').val())) {
                $('#password_confirmation').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.fill_confirm_password') }}</span>");
                return false;
            } else if ($('#password').is(':focus')) {
                $('#password_confirmation').focus();
                return false;
            }

            if ($('#password').val() != $('#password_confirmation').val()) {
                $('#password_confirmation').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.password_confirm_must_be_same') }}</span>");
                return false;
            }

            if ((!$('#password_confirmation').is(':focus')) && (!$('#first_name').val())) {
                $('#first_name').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.fill_first_name') }}</span>");
                return false;
            } else if ($('#password_confirmation').is(':focus')) {
                $('#first_name').focus();
                return false;
            }

            if ($('#first_name').is(':focus')) {
                $('#last_name').focus();
                return false;
            }

            if ((!$('#last_name').is(':focus')) && (!$('#email').val())) {
                $('#email').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.fill_email') }}</span>");
                return false;
            } else if ($('#last_name').is(':focus')) {
                $('#email').focus();
                return false;
            }

            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
            if (re.test($('#email').val()) === false) {
                $('#email').focus().parent().addClass('has-error').append("<span class='help-box text-danger'>{{ trans('alerts.users.invalid_email') }}</span>");
                return false;
            }

            if ($('#email').is(':focus')) {
                $('#signature').focus();
                return false;
            }

            return true;
        }
    });
});
</script>