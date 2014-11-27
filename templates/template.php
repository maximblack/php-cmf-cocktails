<!DOCTYPE html>
<html>
    <head>
        <title>{$title}</title>
        <link rel="stylesheet" type="text/css" href="{$url}css/style.css" />
        <script type="text/javascript" src="{$url}js/jquery-1.8.3.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="sidebar">
                <ul id="menu">
                    <li>
                        <a href="{$url}"><img src="{$url}images/home.png"><span>Home</span></a>
                    </li>
                    {$menu}
                </ul>
            </div>
            <div id="content">
                {$content}
            </div>
        </div>
        <script type="text/javascript">
            
        </script>
    </body>
</html>