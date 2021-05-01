
// Form Validation
jQuery(document).ready(function ($) {
    $('.ui.form.inquiry')
        .form({
            fields: {
                name: {
                    identifier: 'name',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter your name'
                        }
                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter a valid email address'
                        }
                    ]
                },
                phone: {
                    identifier: 'phone',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter a valid phone number'
                        }
                    ]
                },
                message: {
                    identifier: 'message',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter a valid message'
                        }
                    ]
                }
            }
        })
    // radio button
    $('.ui.radio.checkbox')
        .checkbox()
        ;

    // Show form
    $('.ui.radio.checkbox').click(function (event) {
        if ($('#smtp').is(':checked')) {
            $('#smtpform').show();
        }
        else {
            $('#smtpform').hide();
        }
    });


    // ajax form
    // Get the form.
    var form = $('#ajax-contact');

    // Set up an event listener for the contact form.
    $(form).submit(function (e) {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};


        that.find('[name]').each(function (index, value) {
            //  console.log(value.name);
            if (value.name == 'mail') {
                if (value.checked) {

                }

            }
            var that = $(this),
                name = that.attr('name'),
                value = that.val();
            data[name] = value;
        });
        // validate selected
        if (data.mail) {
            var mailSelected = document.querySelector('input[name="mail"]:checked').value;
            data.mail = mailSelected;
        }
        // console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (response) {
                console.log(response);
                $('#success').show().html(response);
            }
        });

        return false;
    });

});

