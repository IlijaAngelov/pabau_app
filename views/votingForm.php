<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
$config = require __DIR__ . '/../config/config.php';

error_reporting(E_ALL); ini_set('display_errors',1);

use App\Controllers\UserController;

$pdo = new Database($config['database']);

$query = new UserController($pdo);

try {
    $users = $query->getAllUsers();
} catch(PDOException $e) {
    die($e->getMessage());
}

// This imitates a logged-in user
$u = array_rand($users);
$session_user_id = $users[$u]['id'];
$session_user = $users[$u]['firstname'] . ' ' . $users[$u]['lastname'];
?>
<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="container voting_form">
<h1>Vote for your favourite nominee!</h1>

    <form action="" method="POST" id="submit_vote_form">
        <div class="logged_field">
            <label for="username">Logged as </label><br>
            <input type="text" id="username" name="username" value="<?= $session_user; ?>" readonly />
        </div>

        <div class="selection_field">
            <div class="field">
                <label for="category">Categories</label><br>
                <select name="category" id="category">
                    <option value="Makes Work Fun">Makes Work Fun</option>
                    <option value="Team Player">Team Player</option>
                    <option value="Culture Champion">Culture Champion</option>
                    <option value="Difference Maker">Difference Maker</option>
                </select>
            </div>

            <div class="field">
                <label for="nominee">Nominees</label><br>
                <select name="nominee" id="nominee">
                    <?php foreach ($users as $user): ?>
                        <?php
                            if($session_user_id === $user['id']) {
                                continue;
                            }
                        ?>
                        <option value="<?= $user['id']; ?>"><?= $user['firstname'] . ' ' . $user['lastname'] ?></option>
                    <?php endforeach;  ?>
                </select>
            </div>
        </div>

        <div class="textarea_field">
            <label for="comment">Leave a comment:</label><br>
            <textarea name="comment" id="comment" cols="30" rows="5" minlength="5" maxlength="150" required></textarea>
            <p id="comment-error" class="text-danger" style="display:none">Please enter a comment</p>
        </div>

        <div class="submit_field">
            <input type="hidden" name="action" value="vote"><br>
            <button type="submit" id="submit" class="submit-btn">Vote</button>
        </div>

    </form>
</div>
</body>
</html>
<script src="/public/js/submitVote.js"></script>