<li><a id="addTag" href="{$url}?controller=cocktail&action=add_tag">
        <img src="{$url}images/category.png">
        <span>Adauga Tag</span></a>
</li>
<li><a id="addIngridient" href="{$url}?controller=cocktail&action=add_ingridient">
        <img src="{$url}images/ingridient.png">
        <span>Adauga Ingredient</span></a>
</li>
<li><a id="addCocktail" href="#">
        <img src="{$url}images/save.png">
        <span>Salveaza cocktail</span></a>
</li>
<script type="text/javascript">
    $(function() {

        $('#addCocktail').click(function() {
            
            $('.ingridient-selected').each(function(){
                
                var ingridient_id=$(this).attr('ingridient_id');
                $('#formAddCocktail').append('<input type="hidden" name= "ingridients_id[]" value='+ ingridient_id +'>');
                
            });
        
            $('.tag-selected').each(function(){
                
                var tag_id=$(this).attr('tag_id');
                $('#formAddCocktail').append('<input type="hidden" name= "tags_id[]" value='+ tag_id +'>');
                
            });
            

            $('#formAddCocktail').submit();

        });
    

    });
</script>