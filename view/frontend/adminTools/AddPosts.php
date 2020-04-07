<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>

<?php
ob_start()?>

<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
    
    
        <?php 
            if(!empty($singlePost)){
        ?>        
            <form method="post" action="posts.php?action=editPosts&amp;id=confirm&amp;postId=<?= $singlePost['id'] ?>" >

                <div class="form-row">
                    <div class="col-4">
                    <input type="text" class="form-control" placeholder="<?= $singlePost['author']?>" name="author" id="author" required        
                    oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                    onchange="this.setCustomValidity('')">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="<?= $singlePost['title']?>" name="title" id="title" required        
                        oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                        onchange="this.setCustomValidity('')">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 pt-5">
                        <label>Extrait de l'article : </label>
                    </div>
               
                    <div class="col-12">
                        <textarea name="sample" id="sample" rows="5" cols="80" required        
                    oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                    onchange="this.setCustomValidity('')"><?= $singlePost['post_sample']?></textarea>
                    </div>

                </div>

                <div class="form-row">
                    
                    <div class="col-12 pt-5">
                        <label>Contenu de l'article : </label>
                    </div>
                
                    <div class="col-12">
                        <textarea  name="editor" id="editor" rows="10" cols="80" required        
                    oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                    onchange="this.setCustomValidity('')"><?= $singlePost['content']?></textarea>
                    </div>

                    <div class="col-4">
                        <input type="submit" name="submit" value="Editer">
                    </div>

                </div>
            </form> 
            

        <?php } else { ?>
            <form method="post" action="../../../posts.php?action=submit">

            <div class="form-row">
                    <div class="col-4">
                    <input type="text" class="form-control" placeholder="Votre nom" name="author" id="author" required        
                    oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                    onchange="this.setCustomValidity('')">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="titre" name="title" id="title" required        
                    oninvalid="this.setCustomValidity('Ce champs ne peut être vide.')"
                    onchange="this.setCustomValidity('')" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 pt-5">
                        <label>Extrait de l'article : </label>
                    </div>
               
                    <div class="col-12">
                        <textarea name="sample" id="sample" rows="5" cols="80" value="Cet extrait apparaitra sur la page principale du blog."></textarea>
                    </div>

                </div>

                <div class="form-row">
                    
                    <div class="col-12 pt-5">
                        <label>Contenu de l'article : </label>
                    </div>
                
                    <div class="col-12">
                        <textarea  name="editor" id="editor" rows="10" cols="80" value="Contenu principale de votre article." 
                    ></textarea>
                    </div>

                    <div class="col-4">
                        <input type="submit" name="submit" value="Poster">
                    </div>

                </div>
            </form> 

        <?php } '' ?>

</br>


    <script>
ClassicEditor
	.create( document.querySelector( '#sample' ), {
		ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
		toolbar: [ 'heading', '|', 'bold', 'italic', 'underline', '|', 'link' , 'bulletedList', 'numberedList', 'blockQuote','|','undo', 'redo' ] , 

	} )
	.catch( error => {
		console.error( error );
	} );

    ClassicEditor
	.create( document.querySelector( '#editor' ), {
		ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
		toolbar: [ 'ckfinder', '|', 'heading', '|', 'bold', 'italic', '|', 'link' , 'bulletedList', 'numberedList', 'blockQuote' ,'|','undo', 'redo' ]
	} )
	.catch( error => {
		console.error( error );
	} );
    </script>
    
    <?php $addArticle = ob_get_clean();?>

