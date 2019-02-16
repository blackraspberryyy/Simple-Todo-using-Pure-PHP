<!DOCTYPE>
<!DOCTYPE html>
<html>
  <head>
    <title>Todo List</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <style>
      .container, .container-fluid{
        background: #ccc;
      }
    </style> -->
  </head>
  <body>
    <div class="container">
      <h1>Todo list!</h1>

      <button type="button" class="btn btn-success" style="margin-bottom:16px;" data-toggle="modal" data-target="#exampleModal">+ Add Todo</button>

      <?php
        include('conn.php');
        $query = "SELECT * FROM list";
        $result = mysqli_query($con, $query);
      ?>
      
      <!--TABLE FOR THE LIST-->
      <table class="table table-dark table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)):?>
          <tr>
            <td><?= $row['title']?></td>
            <td><?= $row['description']?></td>
            <td><?= $row['time']?></td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </td>
          </tr>
          <?php endwhile;?>
        </tbody>
      </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="add_todo.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">+ Add Todo List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="description">Example textarea</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
              </div>
              <div class="form-group">
                <label for="time">time</label>
                <input type="text" class="form-control" id="time" name="time" placeholder="Enter Time">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add to Todo List</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>