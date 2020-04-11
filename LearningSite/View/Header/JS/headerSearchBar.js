var mediaSearchResults = document.getElementById("media-search-results");
if(mediaSearchResults.innerHTML == "")
{
    $("#searchBar").html('<input class ="searchBox centerContent" id = "searchBox" name="search" type="text">')
    $("#searchBtn").html('<button class="searchBtn centerContent button" id = "searchBtn" type="submit">Search</button>');
}
