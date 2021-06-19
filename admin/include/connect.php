<?php include 'config.php'; ?>

              <table id="default-datatable" class="table table-bordered">
                <thead>
                  <tr>
                    <th>name</th>
                    <th>mobile</th>
                    <th>email</th>
                    <th>username</th>
                    <th>password</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php
					    $query=mysqli_query($con,"SELECT * from admin");
					    while($row=mysqli_fetch_array($query)){
					      extract($row);
					?>
                  <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $mobile; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $password; ?></td>
                    <td><a href="http://localhost/sketchography/admin/<?php echo $image; ?>" data-toggle="tooltip" title="Click To Download Image!" download><img src="http://localhost/sketchography/admin/<?php echo $image; ?>" height="30" width="50"></td></a>
                    <td>
                      <a href="delete.php?admin=<?php echo $id; ?>" class="btn btn-sm btn-danger waves-effect waves-light m-1" data-toggle="tooltip" title="Click To Delete!" onclick="return confirm('Are you sure?')">delete</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>