$(function(){
    $(".filter-show-all").click(function(e){
        // Prevent the default action on the link
        e.preventDefault();

        $(this).show();

        // Show all the cards
        $(".pokemon-card").each(function(){
            $(this).show();
        });
    });

    $(".filter-letter").click(function(e){
        // Prevent the default action on the link
        e.preventDefault();

        var filterLetter = $(this).text();
        var filteredCardIDs = [];

        // Iterate over all the card titles to extract all the ones beginning with the filterLetter
        $(".card-title").each(function(){
            var firstLetter = $(this).text().substring(0, 1);

            if (firstLetter === filterLetter) {
                // Get the card name
                var cardID = $(this).parent().parent().attr("id");
                // Add it to the array of cards to keep in the filter
                filteredCardIDs.push(cardID);
            }
        });

        // Iterate over all the cards to hide all the ones that are not in the filteredCards array
        $(".pokemon-card").each(function(){
            var thisID = $(this).attr("id");
            var inArray = $.inArray(thisID, filteredCardIDs);

            if (inArray === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

});