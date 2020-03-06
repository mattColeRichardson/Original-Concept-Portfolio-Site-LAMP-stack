var selectMe = document.getElementsByClassName("selectMovie");
var i = 0;
console.log("display movie selected Ran");
while(i<9)
{
    selectMe[i].addEventListener("click", selectMovieBtn);
    i++;
}

function selectMovieBtn(event)
{
    console.log("You clicked a button!");
    var movieTitle = document.getElementsByClassName("movieTitle")[event.target.value];
    movieSelected = event.target.value;
    selectedMovie(movieTitle.innerHTML);
    if (i == selectMe.length)
    {
        i = null;
    }
}
function selectedMovie(Title)
{
    $("#media-search-results").empty();
    searchByTitle(Title.slice(7)).then(function(value)
    {
        displaySelected(value);
    });
}
