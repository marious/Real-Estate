$(".mailchimp").ajaxChimp({callback:function(s){"success"===s.result?($(".subscription-success").html('<i class="fa fa-check"></i>'+s.msg).fadeIn(1e3),$(".subscription-error").fadeOut(500)):"error"===s.result&&$(".subscription-error").html('<i class="fa fa-times"></i>'+s.msg).fadeIn(1e3)},url:""});
