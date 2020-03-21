<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script></head>
<body>
    <form method="post" action="../../../posts.php?action=submit">
        <label>Auteur : <input type="text" name="author" id="author"> </label>
</br>
        <label>Titre : <input type="text" name="title" id="title"></label>
</br>
        <label>Extrait de l'article : 
</br>
        <textarea name="sample" id="sample" rows="5" cols="80"></textarea>
</br>
        <textarea name="editor" id="editor" rows="10" cols="80">
        This is my textarea to be replaced with HTML editor.
        </textarea>
        <input type="submit" name="submit" value="SUBMIT">
    </form>

    <script>
        ClassicEditor
            .create( document.querySelector( '#sample' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

</body>
</html>