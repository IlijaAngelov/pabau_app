$(document).ready(function () {
    $(".category_winner").click(function () {
        let url = '/generate';
        let data = $(this).attr('data-winner');
        console.info(data);
        $.ajax({
            type: "POST",
            url: url,
            data: {data},
            success: function(response){
                window.location.href = "/";
            },
            error: function(response) {
                alert('error');
            }
        });
    });
});
