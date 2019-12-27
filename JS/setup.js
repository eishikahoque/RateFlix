submitActorsBtn = document.getElementById('actorsSubmit');
if (submitActorsBtn) {
    submitActorsBtn.addEventListener('click', submitActors, false);
}
submitGenreBtn = document.getElementById('genreSubmit');
if (submitGenreBtn) {
    submitGenreBtn.addEventListener('click', submitGenres, false);
}

submitMovieBtn = document.getElementById('movieSubmit');
if (submitMovieBtn) {
    submitMovieBtn.addEventListener('click', submitMovies, false);
}

submitShowBtn = document.getElementById('showSubmit');
if (submitShowBtn) {
    submitShowBtn.addEventListener('click', submitShows, false);
}


function submitActors() {
    var actorIds = document.querySelectorAll('input[name="actors[]"]:checked');

    submitTypes('actors', actorIds);
}

function submitGenres() {
    var genreIds = document.querySelectorAll('input[name="genre[]"]:checked');

    submitTypes('genre', genreIds);
}

function submitMovies() {
    var movieIds = document.querySelectorAll('input[name="movies[]"]:checked');

    submitTypes('movies', movieIds);
}

function submitShows() {
    var showIds = document.querySelectorAll('input[name="shows[]"]:checked');

    submitTypes('shows', showIds);
}

function submitTypes(type, selectedIds) {
    var options = [];
    for (var i = 0; i < selectedIds.length;  i++)
    {
        options.push(selectedIds[i].value);
    }
    var selectedOptions = options.join(', ');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process-setup.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`type=${type}&selected_options=${selectedOptions}`);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        console.log(xhr.responseText);
        var responseJSON = JSON.parse(xhr.responseText);
        if (responseJSON["success"] === "true") {
            if (type === 'actors') {
                window.location.href = "/RateFlix/setup-movies.php";
            } else if (type === 'genre') {
                window.location.href = "/RateFlix/setup-actors.php";
            } else if (type === 'movies') {
                window.location.href = "/RateFlix/setup-shows.php";
            } else if (type === 'shows') {
                window.location.href = "/RateFlix/home.php";
            }
        }
      }
    };
}