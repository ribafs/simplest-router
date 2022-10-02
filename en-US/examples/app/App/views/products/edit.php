<div class="container">
    <h2 class="text-center">Product</h2>
    <div>
		<br><br>
        <form action="<?php echo URL; ?>product/update" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Name</label></td>
            <td><input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($regs->name, ENT_QUOTES, 'UTF-8'); ?>" required autofocus/></td></tr>
            <td><label>Price</label></td>
            <td><input class="form-control" type="text" name="price" value="<?php echo htmlspecialchars($regs->price, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <input type="hidden" name="field_id" value="<?php echo htmlspecialchars($regs->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_product" value="Update Product" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>

