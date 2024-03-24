<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
</head>
<style>
    #title{
        text-align: center;
        font-size: 50px;
    }
</style>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action="" method="post">
<fieldset>

<!-- Form Name -->
<legend id="title">Category</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="categories_id">CATEGORIES ID</label>  
  <div class="col-md-4">
  <input id="categories_id" name="categories_id" placeholder="CATEGORIES ID" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="categories_name">CATEGORIES NAME</label>  
  <div class="col-md-4">
  <input id="categories_name" name="categories_name" placeholder="CATEGORIES NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="slug">SLUG</label>  
  <div class="col-md-4">
  <input id="slug" name="slug" placeholder="SLUG" class="form-control input-md" required="" type="text">
    
  </div>
</div>
 <!-- File Button --> 
 <div class="form-group">
  <label class="col-md-4 control-label" for="img">IMAGE</label>
  <div class="col-md-4">
    <input id="img" name="img" class="input-file" type="file">
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">ADD</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
    <button style="background-color: red;" id="submit" name="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="{{ route('home') }}">Back To Home</a></button>
  </div>
  </div>

</fieldset>
</form>

</body>
</html>