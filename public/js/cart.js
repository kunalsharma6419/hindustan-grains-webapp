$(document).ready(function() {
    function updateQuantity(index, newQuantity) {
        $('#quantity-input-' + index).val(newQuantity);
        const itemId = $('#cart-item-' + index).data('item-id');

        $.ajax({
            url: '/update-cart', 
            method: 'GET',
            data: {
                "_token"   : "{{ csrf_token() }}",
                quantity: newQuantity,
                itemId: itemId 
            },
            success: function(response) {
                if(response.status)
                {
                    Swal.fire({
                        title: 'Quantity Updated',
                        text: 'Quantity updated successfully',
                        icon: 'info',
                        confirmButtonText: 'OK',
                    }).then((result)=>{
                    if(result.isConfirmed)
                    {
                        window.location.href = response.route;
                    }
                    });
                  
                }
            },
            error: function(error) {
                console.error('Error updating quantity:', error);
            }
        });
    }

    // Decrease button
    $('.decrease-btn').click(function() {
        const index = $(this).data('index');
        let currentQuantity = parseInt($('#quantity-input-' + index).val());
        if (currentQuantity > 1) {
            updateQuantity(index, currentQuantity - 1);
        }
    });

    // Increase button
    $('.increase-btn').click(function() {
        const index = $(this).data('index');
        let currentQuantity = parseInt($('#quantity-input-' + index).val());
        updateQuantity(index, currentQuantity + 1);
    });

    // Input change event
    $('input[type="number"]').on('change', function() {
        const index = $(this).attr('id').split('-')[2]; 
        let newQuantity = parseInt($(this).val());
        if (newQuantity < 1) {
            $(this).val(1); 
            newQuantity = 1;
        }
        updateQuantity(index, newQuantity);
    });
});



function myFunctionh() {
    var myLinksh = document.querySelector(".myLinksh");
    myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
    var myLinkshc = document.querySelector(".myLinkshc");
    myLinkshc.style.display = (myLinkshc.style.display === "block" || myLinkshc.style.display === "") ? "none" : "block";

}
function mymenu() {
    var menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
    var myLinksh = document.querySelector(".myLinksh");
    myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
}
