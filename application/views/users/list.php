<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codeigniter CRUD Application With Example - Tutsmake.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row mt40">
   <div class="col-md-10">
    <h2><?php echo $title; ?></h2>
   </div>
   <div class="col-md-2">
    <a href="<?php echo base_url('user/create/') ?>" class="btn btn-danger">Add User</a>
   </div>
   <br><br>
 
    <table class="table table-bordered">
       <thead>
          <tr>
             <th>User</th>
             <th>Department</th>
             <th>Description</th>
             <th colspan="2" style="text-align:center;">Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user->username; ?></td>
             <td><?php echo $user->department; ?></td>
             <td><?php echo 'Description' ?></td>
             <td><a href="<?php echo base_url('user/edit/'.$user->username) ?>" class="btn btn-primary">Edit</a></td>
                 <td>
                <form action="<?php echo base_url('user/delete/'.$user->username) ?>" method="post">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
    
</div>
 
</div>
     
</body>
</html>