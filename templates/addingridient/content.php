<div class="content_container">
    <h1>Adauga un nou <span>ingredient</span></h1>
    <form id="formAddIngridient" action="{$url}?controller=cocktail&action=add_ingridient" method="POST">
        <ul class="form">
            <li class="history">Nume Ingredient  (exemplu: "lime")</li>
            <li><input type="text" name="ingridientName" placeholder="Nume ingredient"></li>
            <li class="history">Ingredientele din lista:</li>
            <li>{$ingridients}</li>
        </ul>
    </form>
    
</div>