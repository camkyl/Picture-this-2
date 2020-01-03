<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST["like"])) {

    $statement = $pdo->prepare("SELECT * FROM reactions WHERE user_id = :user_id AND post_id = :post_id");

    $statement->execute([
        ":user_id" => $_SESSION["user"]["id"],
        ":post_id" => $_POST["postId"]
    ]);

    $isLike = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($isLike)) {

        $statement = $pdo->prepare("INSERT INTO reactions (user_id, post_id, reaction_type) VALUES (:user_id, :postId, 1)");
    
        $statement->execute([
            ":user_id" => $_SESSION["user"]["id"],
            ":postId" => $_POST["postId"]
        ]);

    }

    if (!empty($isLike)) {

        $statement = $pdo->prepare("DELETE FROM reactions WHERE user_id = :user_id AND post_id = :postId");
        $statement->execute([
            ":user_id" => $_SESSION["user"]["id"],
            ":postId" => $_POST["postId"]
        ]);

    }

    redirect("/profile.php");
    
}
