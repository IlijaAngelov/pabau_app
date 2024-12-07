$(document).ready(function () {
    $(".category_winner").click(function () {
        let url = 'generate.php';
        let data = $(this).attr('data-winner');
        console.info(data);
        $.ajax({
            type: "POST",
            url: url,
            data: {data},
            success: function(response){
                window.location.href = "/views/generate.php";
            },
            error: function(response) {
                // alert('error');
            }
        });

    });
});
