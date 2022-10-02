<div class="container">
    <h2 class="text-center">Customer</h2>
    <div>
        <br>
        <form action="<?php echo URL; ?>customer/create" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Name</label></td>
            <td><input class="form-control" type="text" name="name" value="" required /></td></tr>
            <td><label>Age</label></td>
            <td><input class="form-control" type="text" name="age" required /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_create_customer" value="Create Customer" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
