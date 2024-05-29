<!DOCTYPE html>
<html>

<head>
  <title>Upload Image to Supabase</title>
</head>

<body>
  <form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="image">Choose an image:</label>
      <input type="file" id="image" name="image">
    </div>
    <div>
      <button type="submit">Upload</button>
    </div>
  </form>
</body>

</html>