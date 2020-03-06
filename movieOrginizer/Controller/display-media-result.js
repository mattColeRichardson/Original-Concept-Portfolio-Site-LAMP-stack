var searchBtn = document.getElementById("searchBtn");
var searchBox = document.getElementById("movieSearchBox");

var searchBtnXS = document.getElementById("searchBtnXS");
var searchBoxXS = document.getElementById("searchBoxXS");


searchBtn.addEventListener("click", search);
searchBox.addEventListener("keypress", search);

searchBtnXS.addEventListener("click", search);
searchBoxXS.addEventListener("keypress", search);

function search(event)
{
    if (event.which === 13 || event.which === 1)
    {
        userSearch = searchBox.value;
        userSearchXS = searchBoxXS.value;
        if (userSearch == "")
        {
            console.log("You did not search for anything!");
            getMovie(userSearchXS).then(function(value)
            {
                postSearch(value);
            });
        }
        else
        {
            getMovie(userSearch).then(function(value)
            {
                postSearch(value);
            });
        }
        
    }
}