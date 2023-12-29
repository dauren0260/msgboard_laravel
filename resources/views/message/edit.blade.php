<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/message.css" type="text/css">
    <title>Document</title>
</head>
<body>
        <div class="title">留言版 - 編輯留言</div>    
        <form action="updateDB.php" method="post">
            <div class="msgContainer">
                <div class="avatar commentAvatar">
                    <?php echo '<img src="./assets/img/'.$avatar.'" alt="avatar" />'; ?>
                    <div class="username"><?php echo $name; ?></div>
                </div>
                <textarea name="content" id="content" cols="80" rows="15"><?php echo $comment; ?></textarea>
                <input type="hidden" name="commentNo"  value="<?php echo $commentNo; ?>">
                <button type="submit" value="send" class="btn btn-outline-primary">送出</button>
            </div>
        </form>
    
</body>
</html>