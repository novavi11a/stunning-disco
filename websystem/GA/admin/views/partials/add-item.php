<div class="form-signin w-100 m-auto">

  <form method="post" enctype="multipart/form-data" class="formSubmit">
    <h1 class="h3 mb-3 fw-normal">Add an Item</h1>

    <div class="form-floating">
    <input type="file" class="form-control mb-2 <?php
                    if(!empty($errors['fileToUpload']))
                    {
                        echo $errors['fileToUpload'];
                    }else { echo ""; }
                ?> fileToUpload" name="fileToUpload" id="fileToUpload" value="<?=old_value('fileToUpload')?>">
      <label for="floatingInput">Item Image</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control mb-2 <?php
                    if(!empty($errors['name']))
                    {
                        echo $errors['name'];
                    }else { echo ""; }
                ?> name" name="name" id="floatingInput" placeholder="Name" value="<?=old_value('name')?>">
      <label for="floatingInput">Name</label>
    </div>

    <div class="form-floating ">
    <textarea class="form-control mb-2 <?php
                    if(!empty($errors['description']))
                    {
                        echo $errors['description'];
                    }else { echo ""; }
                ?> description" name="description" rows="4" cols="50"><?=old_value('description')?>
    </textarea>
      

      <label for="floatingPInput">Description</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control mb-2 <?php
                    if(!empty($errors['category']))
                    {
                        echo $errors['category'];
                    }else { echo ""; }
                ?> category" name="category" id="floatingInput" placeholder="Name" value="<?=old_value('category')?>">
      <label for="floatingInput">Category</label>
    </div>

    <div class="form-floating">
      <input type="number" step="0.01" class="form-control mb-2 <?php
                    if(!empty($errors['price']))
                    {
                        echo $errors['price'];
                    }else { echo ""; }
                ?> price" name="price" id="floatingInput" placeholder="Price" value="<?=old_value('price')?>">
      <label for="floatingInput">Price</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control mb-2 <?php
                    if(!empty($errors['quantity']))
                    {
                        echo $errors['quantity'];
                    }else { echo ""; }
                ?> quantity" name="quantity" id="floatingInput" placeholder="Quantity" value="<?=old_value('quantity')?>">
      <label for="floatingInput">Quantity</label>
    </div>

    <div class="form-floating">
    <button class="btn btn-primary w-10 py-2 col-md-3 addItem" name='submit' type="submit">Sign in</button>
    <a href="../views/inventory.php" class="btn btn-secondary w-10 py-2 col-md-3" type="submit">Cancel</a>
    </div>

    
  </form>
</div>