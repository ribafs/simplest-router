<!-- Search form -->
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <form action="<?=URL?>customer/search" method="get" >
            <div class="pull-right topo">
                <span class="pull-right">  
                    <label class="control-label" for="palavra" style="padding-right: 5px;">
                        <input type="text" value="" placeholder="name" class="form-control" name="keyword">
                    </label>
                </span>          
                <input type="submit" name="submit_search_customer" value="Search" class="btn btn-primary"/> 
            </div>
        </form>
    </div>
</div>
<br>

<div class="container">
	<a class="btn btn-primary btn-sm mt-3" href="<?=URL . 'customer/create'; ?>">Add Customer</a>
    <div>
        <br>        
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><strong>ID</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Age</strong></td>
                <td colspan="2"><strong>Actions</strong></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fetchAll as $customer) { ?>
                <tr>
                    <td><?php if (isset($customer->id)) echo htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->name)) echo htmlspecialchars($customer->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->age)) echo htmlspecialchars($customer->age, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?=URL . 'customer/edit/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8')?>">Edit</a></td>
                    <td><a onclick="return confirm('Really delete ?')" href="<?=URL . 'customer/delete/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8')?>">Delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
