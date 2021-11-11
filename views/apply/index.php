<h1>Apply pagina</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="my_file">
    <button type="submit" class="secondary-btn">Opladen...</button>
</form>
<pre>
    <?php
        if(isset($_FILES['my_file']) && $_FILES['my_file']['size'] > 0) {
            $tmp_file = $_FILES['my_file']['tmp_name'];
            $file_name = $_FILES['my_file']['name'];

            move_uploaded_file($tmp_file, BASE_URL . 'views/uploads/' . $file_name);
            print_r(mime_content_type(BASE_URL . 'views/uploads/' . $file_name));
        }

        $items = scandir(BASE_URL . 'views/uploads/');
        var_dump($items);
       
    ?>
</pre>
