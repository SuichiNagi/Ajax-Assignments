<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gotta Catch'em All</title>
    </head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <style>
            #container{
                cursor: pointer;
                width: 900px;
                display: inline-block;
                margin-right: 15px;
            }
            #pokedex{
                display: inline-block;
                vertical-align: top;
                border: 1px solid black;
                width: 250px; 
                text-align: center;
                padding: 15px;
                position: fixed;
            }
            h4, h5{
                border-top: 1px solid black;
                margin: 3px;
                padding: 3px;
            }
        </style>
        <script>
            $(document).ready(function(){
                $.get("https://pokeapi.co/api/v2/pokemon/1", function(res){

                    newArr = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png';
                    var html_str = '';
                    html_str += '<h2>Pokedex<h2>';

                    for(let i = 1; i<=152; i++){
                        html_str += `<img id="${i}" src="${newArr.replace(1,i)}">`;
                    }
                    $("#container").html(html_str);
                    var name = res.name;

                        $("img").click(function(){
                            image = this.id;
                            newGet = "";

                            for(let j=1; j<=152; j++){
                                if(image == j){
                                    newGet += `https://pokeapi.co/api/v2/pokemon/${j}/`;
                                }
                            }
                            $.get(newGet, function( data ){
                                var pokedex = "";
                                pokedex += `<h3>${data.name.toUpperCase()}</h3>`;
                                pokedex += `<img id="${image}" src="${newArr.replace(1,image)}">`;
                                pokedex += '<h4>Types</h4></br>';
                                for(let k=0; k<data.types.length; k++){
                                    pokedex += data.types[k].type.name + "</br>";
                                }
                                pokedex += "<h5>Height:</h5></br>" + data.height + "</br>";
                                pokedex += "<h5>Weight:</h5></br>" + data.weight + "</br>";

                                $("#pokedex").html(pokedex);
                            });
                            console.log(pokedex);
                            pokedex += res.name;
                        });
                });
            });
        </script>
    <body>
        <div id="container">
        </div>
        <div id="pokedex">
        </div>
    </body>
</html>
