<?php
ob_start()?>

<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    
    
        <?php 
            if(!empty($singlePost)){
        ?>        
            <form method="post" action="posts.php?action=editPosts&amp;id=confirm&amp;postId=<?=$singlePost['id'] ?>">
                <label>Auteur : <input type="text" name="author" id="author" value="<?= $singlePost['author']?>"> </label>
                </br>
                <label>Titre : <input type="text" name="title" id="title" value="<?= $singlePost['title']?>"></label>
                </br>
                <label>Extrait de l'article : </label>
                </br>

                <textarea name="sample" id="sample" rows="5" cols="80">
                    <?= $singlePost['post_sample']?>
                </textarea>
                <textarea name="editor" id="editor" rows="10" cols="80">
                    <?= $singlePost['content']?>
                </textarea>
                <input type="submit" name="submit" value="SUBMIT">
            </form>

        <?php } else { ?>
            <form method="post" action="../../../posts.php?action=submit">
                <label>Auteur : <input type="text" name="author" id="author"> </label>
                </br>
                <label>Titre : <input type="text" name="title" id="title"></label>
                </br>
                <label>Extrait de l'article : </label>
                </br>

                <textarea name="sample" id="sample" rows="5" cols="80">
                    
                </textarea>

                <label>Contenu de l'article : </label>
                <textarea name="editor" id="editor" rows="10" cols="80">
                   
                </textarea>
                <input type="submit" name="submit" value="SUBMIT">
            </form>
        <?php } ?>

</br>


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
    
    <?php $addArticle = ob_get_clean();?>

