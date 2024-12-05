<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/main.css" type="text/css">
    <script type="text/javascript" src="/public/js/submitVote.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Voting System</title>
</head>
<body>
    <h1>Vote for your favourite nominee!</h1>

    <form action="/public/index.php" method="POST" id="submit_vote_form">
        <div>
            <label for="username">Logged as:</label><br>
            <input type="text" id="username" name="username" value="Ilija" readonly />
        </div>

        <div>
            <label for="category">Categories</label><br>
            <select name="category" id="category">
                <option value="Makes Work Fun">Makes Work Fun</option>
                <option value="Team Player">Team Player</option>
                <option value="Culture Champion">Culture Champion</option>
                <option value="Difference Maker">Difference Maker</option>
            </select>
        </div>

        <div>
            <label for="nominee">Nominees</label><br>
            <select name="nominee" id="nominee">
                <option value="1">Alex</option>
                <option value="2">Betty</option>
                <option value="3">Cathy</option>
                <option value="4">Denise</option>
                <option value="5">Ilija</option>
            </select>
        </div>

        <label for="comment">Leave a comment:</label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

        <input type="hidden" name="action" value="vote"><br>
        <button type="submit" id="submit">Vote</button>

    </form>
</body>
</html>