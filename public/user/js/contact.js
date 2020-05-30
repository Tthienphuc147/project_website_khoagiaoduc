$(document).ready(function(){

    (function($) {
        "use strict";


    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                ten: {
                    required: true,
                },
                tieu_de_lien_he: {
                    required: true,
                },
                so_dien_thoai: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                noi_dung_lien_he: {
                    required: true,
                },
                lop_lien_he: {
                    required: true,
                }
            },
            messages: {
                ten: {
                    required: "Trường này bắt buộc phải nhập !",
                },
                tieu_de_lien_he: {
                    required: "Trường này bắt buộc phải nhập !",
                },
                so_dien_thoai: {
                    required: "Trường này bắt buộc phải nhập !",
                    minlength: "Số điện thoại phải có ít nhất 10 số"
                },
                email: {
                    required: "Trường này bắt buộc phải nhập !",
                    email: "Email không hợp lệ !"
                },
                noi_dung_lien_he: {
                    required: "Trường này bắt buộc phải nhập !",
                },
                lop_lien_he: {
                    required: "Trường này bắt buộc phải nhập !",
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"lien-he",
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })

 })(jQuery)
})
