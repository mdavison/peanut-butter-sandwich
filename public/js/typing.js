$(function(){
    var pokemonImage = $("#pokemon").attr("data-pokemon-to-appear");
    var nextPokemonIndex = $("#next-word").attr("data-next-word");

    // Auto focus on the input
    $("#word-input").focus();

    // Prevent the page from reloading if the enter/return key is pressed
    $("form").submit(function(e){
        // TODO: put this back - temporarily disabled for development
        //e.preventDefault();
    });

    $("#word-input").keyup(function(e) {
        if ( $("#word-to-type").text() == $(this).val()) {
            $("#pokemon").attr("src", "/img/pokemon/" + pokemonImage);

            $("#next-word").removeClass("invisible");
        } else {
            $("#pokemon").attr("src", "/img/pokemon/pokeball.png")
        }
    });

    $("#next-word").click(function(){
        window.location = "/pokemon/typing-game/" + nextPokemonIndex;
    });
});