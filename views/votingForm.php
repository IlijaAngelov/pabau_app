<?php require_once __DIR__ . '/partials/header.php'; ?>
<h1>Vote for your favourite nominee!</h1>

    <form action="" method="POST" id="submit_vote_form">
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
        <textarea name="comment" id="comment" cols="30" rows="10" required></textarea>
        <p id="comment-error" class="text-danger" style="display:none">Please enter a comment</p>

        <input type="hidden" name="action" value="vote"><br>
        <button type="submit" id="submit">Vote</button>

    </form>
</body>
</html>
<script src="/public/js/submitVote.js"></script>