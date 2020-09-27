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
        <h1>CodeIgniter 4 CRUD</h1><hr>
        <div class="my-3">
            <a class="btn btn-success" href="/create" role="button">Create New</a>
        </div>
        <?php if(isset($validation)):?>
        <div class="alert alert-danger" role="alert">
            <strong>Validation error</strong>
            <?= $validation->listErrors(); ?>
        </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['message_noti'])):?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['message_noti'] ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['message_error'])):?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['message_error'] ?>
            </div>
        <?php endif; ?>
        
        <h1><?= $title ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($listMovie)):?>
                    <?php foreach ($listMovie  as $row):?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('edit/'.$row['id']) ?>" role="button">Edit</a>
                                <a class="btn btn-danger" onclick="return confirm('Delete movie data? You will not be able to recover it.');" href="<?= base_url('delete/'.$row['id']) ?>" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <div class="text-center">
                       <div class="alert alert-danger" role="alert">
                           <strong>No Data</strong>
                       </div>
                    </div>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>