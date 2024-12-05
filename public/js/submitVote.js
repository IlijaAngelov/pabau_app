$(document).ready(function () {
    $("#submit_vote_form").off('submit').on('submit', function(event) {
        event.preventDefault();
        let username = $("#username").val();
        let nominee = $("#nominee").val();
        let category = $("#category").val();
        let comment = $("#comment").val();
        let url = '/public/submitVote.php';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                username: username,
                nominee: nominee,
                category: category,
                comment: comment
            },
            success: function(response){
                window.location.href = "/views/index.html";
            },
            error: function(response) {
                alert('error');
            }
        });
    });
});