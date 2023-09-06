$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        var last_id = $(".post-id:last").attr("id");
        loadMoreData(last_id);
    }
});

function loadMoreData(last_id){
$.ajax(
        {
            url: '/loadMoreData.php?last_id=' + last_id,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(data)
        {
            $('.ajax-load').hide();
            $("#post-data").append(data);
        })
}