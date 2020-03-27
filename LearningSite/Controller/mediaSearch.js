function mediaSearch()
{
    this.searchBtn = document.getElementById("searchBtn");
    this.searchBox = document.getElementById("searchBox");

    this.starChange;
    this.starValue;
    var that = this;
    this.clearScreen = function()
    {
        $("#media-search-results").empty();
    }
    this.listenForUserSearch = function()
    {
        this.searchBtn.addEventListener("click", this.search);
        this.searchBox.addEventListener("keypress", this.search);
    }
    this.search = function()
    {
        if (event.which === 13 || event.which === 1)
        {
            userSearch = that.searchBox.value;
            if (userSearch == "")
            {
                //do nothing if user does not search for anything.
            }
            else
            {
                getMovie(userSearch).then(function(value)
                {
                    postResults(value);
                });
            }
            
        }
    }
    function postResults(data)
    {
        this.clearScreen;
        $("#media-search-results").load("View/SearchResults/Html/mediaSearchResults", function()
        {
            let i=0;
            let y=0;
            if(data.Response == "True")
            {
                document.getElementById("searchDiv").classList.add("hideSearch");
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
                listenForUserChoise();
            }
            else
            {
                document.getElementById("hiddenH1").classList.remove("hiddenHead");
            }
        });
    }
    function listenForUserChoise()
    {
        var selectMe = document.getElementsByClassName("movieSelectionButton");
        var i = 0;
        while(i<9)
        {
            selectMe[i].addEventListener("click", selectedMovie);
            i++;
        }
    }
    function selectedMovie(event)
    {
        var movieTitle = document.getElementsByClassName("movieTitle")[event.target.value];
        movieSelected = event.target.value;
        $("#media-search-results").empty();
        searchByTitle(movieTitle.innerHTML.slice(7)).then(function(value)//This is a function as part of my IMDBAPI.js and is nessisary for the opperation of this programm 
        {
            displaySelected(value);
        });
    }
    function displaySelected(data)
    {
        $("#media-search-results").load("View/SearchResults/Html/selectedMovie.html", function()
        {
            document.getElementById("movieTitle").innerHTML = data.Title;
            document.getElementById("moviePoster").src = data.Poster
            document.getElementById("moviePlot").innerHTML = data.Plot;
            document.getElementById("movieInfo").innerHTML = "Release Date: "+ data.Year +" Directed By: "+ data.Director + "Genre :" + data.Genre;
            
            document.cookie = "movieTitle = " + "" + data.Title; // Set the cookie so that we can pass it and parse it in PHP
            document.cookie = "mediaType = " + "" + data.Type;
            loadStars();
        });
    }
    function loadStars()
    {
        stars = Array.prototype.slice.call(document.querySelectorAll(".star"));

        document.getElementById("starGroup").addEventListener("click", function(event)
        {
            if(event.target.classList.contains("star"))
            {
                setStarCookie((stars.indexOf(event.target) + 1));
                clearStarsToGrey(4);
                setStarsGold(stars.indexOf(event.target));
            }
        });
    }
    function setStarsGold(starSelected)
    {
        i = starSelected;
        while (i >= 0)
        {
            document.getElementsByClassName("star")[i].src = "View/img/star.png";
            i--;
        }
    }
    function clearStarsToGrey(allStars)
    {
        i = allStars;
        while (i >= 0)
        {
            document.getElementsByClassName("star")[i].src = "View/img/stargray.png";
            i--;
        }
    }
    function setStarCookie(starSelected)
    { 
        document.cookie = "selectedRating = " + "" + starSelected;
    }  
}

var Search = new mediaSearch();
Search.listenForUserSearch();