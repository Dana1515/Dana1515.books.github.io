document.getElementById('filter-form').onsubmit = function(event) {
    event.preventDefault();

    let genre = document.getElementById('genre').value;
    let availability = document.getElementById('availability').value;
    let discount = document.getElementById('discount').value;

    let selectedFilters = {
        genre: genre,
        availability: availability,
        discount: discount
    };

    $("#fon").css({'display': 'block'});
    $("#load").fadeIn(1000, function() {
        $.ajax({
            url: 'main.php',
            data: selectedFilters,
            type: 'get',
            success: function(html) {
                $(".main").empty().html(html).hide().fadeIn(2000, function() {
                    $("#fon").css({'display': 'none'});
                    $("#load").fadeOut(1000);
                    console.log(selectedFilters);
                });
            }
        });
    });
};

