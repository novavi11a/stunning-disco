
<?php

    $id = $_GET['id'];

    $query = 'SELECT * FROM items WHERE id = :id limit 1';
    $row = query($query, ['id' => $id]);


?>


<div class="form-signin w-100 m-auto">

  <form method="post" enctype="multipart/form-data" class="formSubmit">
    <h1 class="h3 mb-3 fw-normal">Edit Item</h1>

    <input type="hidden" name="id" value="<?=$row[0]['id']?>">

    <div class="my-2">
      <label class="d-block">
        <img class="mx-auto d-block imgEdit" src="<?=$row[0]['fileLoc']?>" style="width:200px;height:200px;object-fit:cover;cursor:pointer" alt=""/>
        <input onchange="display_image_edit(this.files[0])" type="file" name="fileToUpload" class="d-none" value="<?=$row[0]['fileLoc']?>"/>
        <p class="text-center">Item Thumbnail</p>
      </label>
        <script>
          function display_image_edit(file){
            document.querySelector(".imgEdit").src = URL.createObjectURL(file);
          }
        </script>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control mb-2 <?php
                    if(!empty($errors['name']))
                    {
                        echo $errors['name'];
                    }else { echo ""; }
                ?> name" name="name" id="floatingInput" placeholder="Name" value="<?=$row[0]['name']?>">
      <label for="floatingInput">Name</label>
    </div>

    <div class="form-floating ">
    <textarea class="form-control mb-2 <?php
                    if(!empty($errors['description']))
                    {
                        echo $errors['description'];
                    }else { echo ""; }
                ?> description" name="description" rows="4" cols="50"><?=$row[0]['description']?>
    </textarea>
      

      <label for="floatingPInput">Description</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control mb-2 <?php
                    if(!empty($errors['category']))
                    {
                        echo $errors['category'];
                    }else { echo ""; }
                ?> category" name="category" id="floatingInput" placeholder="Name" value="<?=$row[0]['category']?>">
      <label for="floatingInput">Category</label>
    </div>

    <div class="form-floating">
      <input type="number" step="0.01" class="form-control mb-2 <?php
                    if(!empty($errors['price']))
                    {
                        echo $errors['price'];
                    }else { echo ""; }
                ?> price" name="price" id="floatingInput" placeholder="Price" value="<?=$row[0]['price']?>">
      <label for="floatingInput">Price</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control mb-2 <?php
                    if(!empty($errors['quantity']))
                    {
                        echo $errors['quantity'];
                    }else { echo ""; }
                ?> quantity" name="quantity" id="floatingInput" placeholder="Quantity" value="<?=$row[0]['quantity']?>">
      <label for="floatingInput">Quantity</label>
    </div>

    <div class="form-floating">
    <button class="btn btn-primary w-10 py-2 col-md-3 addItem" name='submit' type="submit">Edit</button>
    <a href="../views/inventory.php" class="btn btn-secondary w-10 py-2 col-md-3" type="submit">Back</a>
    </div>

    
  </form>
</div>