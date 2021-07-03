<?php
use App\Jurgis;
use Doctrine\ORM\EntityManager;

require '../vendor/autoload.php';
require '../bootstrap.php';

$entityManager = EntityManager::create($conn, $config);

$jurgis = new Jurgis();

if(isset($_POST['message'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $response = $jurgis->responds($message);

    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->insert('chat')
        ->setValue('message', '?')
        ->setValue('response', '?')
        ->setParameter(0, $message)
        ->setParameter(1, $response)
        ->execute()
    ;
}

$chatRepository = $entityManager->getRepository('Chat');
$messages = $chatRepository->findAll();

?>

<!doctype html>
<html lang="lt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pokalbiai su Jurgiu :)</title>
  </head>
  <body>
  <div class="container">
    <div class="chat mt-5 mb-5">

    <?php if(isset($response)) { ?>
    <div class="alert alert-success">Jurgis atsako: <?=$response?></div>
    <?php } ?>

    <h4>Užduokite klausimą</h4>

    <form method="post" action="">
        <div class="mb-3">
            <label for="message" class="form-label">Jūsų klausimas Jurgiui</label>
            <input type="text" name="message" class="form-control" id="message" aria-describedby="messageHelp" placeholder="Įveskite klausimą">
            <div id="messageHelp" class="form-text">Jurgis atsako:
                <ul>
                    <li>"Okis." - jei užduodamas klausimas</li>
                    <li>"Oi oi, atvėsk!" - jei ant jo šauki</li>
                    <li>"Alio! Kuku?" - jei jam nieko nepasakai</li>
                    <li>"Aha gerai." - sakant bent ką kita</li>
                </ul>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Klausti</button>
    </form>
    
    <h4 class="mt-5 mb-4">Istorija</h4>

    <table class="table table-striped table-hover">
    <th>Klausimas</th><th>Atsakymas</th>
    <?php foreach ($messages as $message) : ?>
    <tr><td><?php echo $message->getMessage()?></td><td><?php echo $message->getResponse()?></td></tr>
    <?php endforeach; ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
  </div>
  </body>
</html>