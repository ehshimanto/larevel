// setTimeout(function(){
//     $('alert_success').slideUp(1000);
// },5000);

// setTimeout(function(){
//     $('alert_error').slideUp(1000);
// },10000);

setTimeout(function(){
    $('.alert_success').slideUp(1000); // সঠিক সিলেক্টর ব্যবহার করা হয়েছে
}, 5000);

setTimeout(function(){
    $('.alert_error').slideUp(1000); // সঠিক সিলেক্টর ব্যবহার করা হয়েছে
}, 10000);




// $(document).ready(function(){
//  $(document).on("click", '#delete',function(){
//     var deleteID= $(this).data('id');
//     $('#modal_id').val(deleteID);
//  });
// });

$(document).ready(function(){
    $(document).on("click", '#softDelete', function(){
        var deleteID = $(this).data('id');
        $('#modal_id').val(deleteID); // or .text(deleteID) if it's not an input field
    });

    $(document).on("click", '#restore', function(){
        var deleteID = $(this).data('id');
        $('#modal_id').val(deleteID); // or .text(deleteID) if it's not an input field
    });

    $(document).on("click", '#delete', function(){
        var deleteID = $(this).data('id');
        $('.modal-body #modal_id').val(deleteID); // or .text(deleteID) if it's not an input field
    });
});
