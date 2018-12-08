var shopId =0;

$('.like').on('click', function(event) {
    event.preventDefault();
    shopId = event.target.parentNode.parentNode.dataset['shopid'];
    var isLike = event.target.previousElementSibling != null;
    var selector = '#'+shopId;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, shopId: shopId,userId:userId, _token: token}
    })
        .done(function() {
            $(selector).hide();
        });
});


$('.remove').on('click',function () {
    shopId = event.target.parentNode.parentNode.dataset['shopid'];
    var selector = '#'+shopId;
    $.ajax({
        method: 'POST',
        url:urlRemove,
        data:{shopId:shopId,userId:userId, _token:token}
    })
        .done(function () {
            $(selector).hide();
        });

});