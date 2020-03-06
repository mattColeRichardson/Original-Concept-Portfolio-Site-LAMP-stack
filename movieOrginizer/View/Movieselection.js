function postSearch(data)
{
    $("#media-search-results").empty();
    $("#media-search-results").load("view/media-search", function()
    {
        let i=0;
        let y=0;
        if(data.Response == "True")
        {
            while(y <data.Search.length && y <= 8)
            {
                document.getElementsByClassName("hiddenMov")[i].classList.remove("hiddenMov");
                y++;
            }

            while(i < data.Search.length && i <= 8)
            {
                currentMov = data.Search[i];
                
                document.getElementsByClassName("movPoster")[i].innerHTML ='<img src="' + currentMov.Poster +'" alt = "' + currentMov.Title + 'movie Poster"' + '>';
                document.getElementsByClassName("movieTitle")[i].innerHTML = 'Title: ' + currentMov.Title;
                document.getElementsByClassName("movieInfo")[i].innerHTML ='Release Date: ' + currentMov.Year;
                i++;
            } 
        }
        else
        {
            document.getElementById("hiddenH1").classList.remove("hiddenHead");
        }
         
    });
}

function displaySelected(data)
{
    $("#media-search-results").load("View/SelectedMovie.html", function()
    {
        document.getElementById("movieTitle").innerHTML = data.Title;
        document.getElementById("moviePoster").src = data.Poster
        document.getElementById("moviePlot").innerHTML = data.Plot;
        document.getElementById("movieInfo").innerHTML = "Release Date: "+data.Year +" Directed By: "+ data.Director + "Genre :" + data.Genre;
    });
}