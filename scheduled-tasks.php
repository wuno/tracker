<?php
require('login/includes/header.php');
?>
<div class="container">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Street</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
           <td>
                <a class="blue-text"><i class="options fa fa-user"></i></a>
                <a class="green-text"><i class="options fa fa-pencil"></i></a>
                <a class="red-text"><i class="options fa fa-times"></i></a>
            </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
require('login/includes/footer.php');
?>