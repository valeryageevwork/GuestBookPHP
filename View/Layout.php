<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="View/styles.css">
</head>
<body>
<h1>Форма обратной связи</h1>
<div class="message-form">
  <form action="" method="POST">
    <label for="username">Имя:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="message">Сообщение:</label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br>
    <input type="submit" value="Отправить">
  </form>

  <?php if(!empty($resultError)): ?>
  <section class="error">
    <h2>Ошибки</h2>
    <p>
      <?= $resultError ?>
    </p>
  </section>
  <?php endif; ?>

  <section>
    <h2>Список сообщений</h2>
    <?php if(!empty($resultMessages)): ?>
        <?php foreach($resultMessages as $v): ?>
            <div class="message">
              <h4><?= htmlspecialchars($v["name"]); ?></h4>
              <div class="date"><?= htmlspecialchars($v["date"]); ?></div>
              <p><?= nl2br(htmlspecialchars($v["message"])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
  </section>
</div>
</body>
</html>