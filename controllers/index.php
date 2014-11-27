<?php

class Controller_Index extends Controller {

    public function index() {

        $query = new Query('SELECT cocktails.id,cocktails.nume, cocktails.imagine, cocktails.descriere FROM cocktails');

        $cocktails = $query->asArray();

        $content = '';

        foreach ($cocktails as $cocktail) {

            $query = new Query("SELECT tags.`name` FROM cocktails_tags INNER JOIN tags ON cocktails_tags.tag_id = tags.id WHERE cocktails_tags.cocktail_id = {$cocktail['id']} ");
            $tags = $query->asArray();
            
            $tagsOutput = '';
            
            foreach($tags as $tag) {
                
                $templateTag = new Template('index/tag');
                
                $templateTag->setVariable('name', $tag['name']);
                
                $tagsOutput .= $templateTag;
                
            }
            
            $templateCocktail = new Template('index/cocktail');

            $array = array(
                'numeCocktail' => $cocktail['nume'],
                'srcImagineCocktail' => Url::getInstance()->site() . 'cocktails/' . $cocktail['imagine'],
                'descriereCocktail' => $cocktail['descriere'],
                'id' => $cocktail['id'],
                'cocktailTags' => $tagsOutput,
            );

            $templateCocktail->setArray($array);

            $content .= $templateCocktail;
        }

        $templateMeniu = new Template('index/menu');

        parent::$template->setVariable('content', $content);
        parent::$template->setVariable('menu', $templateMeniu);

        parent::setTitle('Cristina');
        parent::outputHtml();
    }

}

?>