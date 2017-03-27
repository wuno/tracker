
       <form class="form-signup" id="create-customer" name="create-customer" method="POST" action="login/createcustomer.php">
        <h2 class="form-heading">Add New Customer</h2>
        
        <input name="fname" id="fname" type="text" class="form-control" placeholder="Customer First Name" autofocus>
        
        <input name="lname" id="lname" type="text" class="form-control" placeholder="Customer Last Name">
<br>
        <input name="email" id="email" type="text" class="form-control" placeholder="Email">

        <input name="phone" id="phone" type="text" class="form-control" placeholder="Customer Phone Number" autofocus>
<br>        
        <input name="street" id="street" type="text" class="form-control" placeholder="Street Address">

        <input name="city" id="city" type="text" class="form-control" placeholder="City Address">

        <input name="state" id="state" type="text" class="form-control" placeholder="State Address">

        <input name="zip" id="zip" type="text" class="form-control" placeholder="Zip Code">

        <button name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Add Customer</button>

        <div id="message"></div>
      </form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="login/js/bootstrap.js"></script>

    <script src="login/js/addcustomer.js"></script>

    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>

$( "#create-customer" ).validate({
  rules: {
	fname: {
		required: true
	},
    lname: {
      required: true
	},
  email: {
      email: true,
      required: true
  },
  phone: {
      required: true
  },
  street: {
      required: true
  },
  city: {
      required: true
  },
  state: {
      required: true
  },
  zip: {
      required: true
  }
  }
});
</script>


