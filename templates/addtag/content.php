<div class="content_container">
    <h1>Adauga un nou <span>tag</span></h1>
    <form id="formAddTag" action="{$url}?controller=cocktail&action=add_tag" method="POST">
        <ul class="form">
            <li class="history">Nume Tag (exemplu: "Non-alcoolic")</li>
            <li><input type="text" name="tagName" placeholder="Nume Tag"></li>
            <li class="history">Tagurile din lista:</li>
            <li>{$tags}</li>
        </ul>
    </form>
    
</div>
<script type="text/javascript">

    $(function () {
        
        $('.ingridient').click(function (){
            
            $(this).toggleClass('ingridient ingridient-selected');
            
        });
        
    });

</script>