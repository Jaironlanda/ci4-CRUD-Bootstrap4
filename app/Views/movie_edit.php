<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container">
        <?php if(isset($validation)):?>
        <div class="alert alert-danger" role="alert">
            <strong>Validation error</strong>
            <?= $validation->listErrors(); ?>
        </div>
        <?php endif; ?>

        <h1><?= $title ?></h1>
        <form action="/edit/<?= $movieData['id'] ?>" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $movieData['title'] ?>" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="<?= $movieData['description'] ?>">
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="/" role="button">Back to Index</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>