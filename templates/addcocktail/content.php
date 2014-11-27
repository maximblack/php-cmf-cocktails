<div class="content_container">
    <h1>Adauga un nou <span>cocktail</span></h1>
    {$infoOutput}
    <form id="formAddCocktail" action="{$url}?controller=cocktail&action=add" method="POST" enctype="multipart/form-data">
        <ul class="form">
            <li class="history">Nume Cocktail (exemplu: "Mojito")</li>
            <li><input type="text" name="cocktailName" placeholder="Nume Cocktail "></li>

            <li class="history">Selectati Tag-urile sau adaugati unul(culoarea albastra-selectat)</li>
            <li>{$tags}</li>

            <li class="history">Selectati ingredientele sau adauga unul(culoarea albastra-selectat)</li>
            <li>{$ingridients}</li>

            <li class="history">Dati o descriere pentru Cocktail</li>
            <li><textarea id="cocktailDescription" name="cocktailDescription" placeholder="Descriere Cocktail "></textarea></li>
            <li>Imagine Cocktail: <input type="file" name="cocktailImage"></li>
        </ul>

    </form>
</div>
<script type="text/javascript">

    $(function() {

        $('.ingridient').click(function() {

            $(this).toggleClass('ingridient ingridient-selected');

        });

        $('.tag').click(function() {

            $(this).toggleClass('tag tag-selected');

        });



    });

</script>