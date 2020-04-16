function mediaSearch()
{
    this.searchBtn = document.getElementById("searchBtn");
    this.searchBox = document.getElementById("searchBox");

    this.starChange;
    this.starValue;
    this.searchHeaderBox;
    var that = this;
    this.clearScreen = function()
    {
        $("#media-search-results").empty();
        $(".mov").addClass("hiddenMov");
    }
    this.listenForUserSearch = function()
    {
        this.searchBtn.addEventListener("click", this.search);
        this.searchBox.addEventListener("keypress", this.search);
    }
    this.listenforHeader = function()
    {
        document.getElementById("searchHeaderBox").addEventListener("keypress", this.search)
        document.getElementById("searchHeaderBtn").addEventListener("click", this.search);
        this.searchHeaderBox = document.getElementById("searchHeaderBox");
    }
    this.search = function()
    {
        if (event.which === 13 || event.which === 1)
        {
            if (that.searchHeaderBox != undefined)
            {

                userSearch = that.searchHeaderBox.value;
            }
            else
            {
                userSearch = that.searchBox.value;
            }    
            
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
        $("#media-search-results").load("view/searchresults/html/mediasearchresults", function()
        {
            let i=0;
            let y=0;
            
            if(data.Response == "True")
            {
                document.getElementById("DisplayNone").classList.add("hideSearch");
                
                while(i < data.Search.length && i <= 8)
                {
                    currentMov = data.Search[i];
                    document.getElementsByClassName("mov")[i].classList.remove("hiddenMov")
                    document.getElementsByClassName("movPoster")[i].innerHTML ='<img src="' + currentMov.Poster +'" alt = "' + currentMov.Title + 'movie Poster"' + '>';
                    document.getElementsByClassName("movieTitle")[i].innerHTML =currentMov.Title;
                    document.getElementsByClassName("movieInfo")[i].innerHTML ='Release Date: ' + currentMov.Year;

                    i++;
                } 
                $("#searchBarDiv").html('<input class ="searchBox centerContent" id = "searchHeaderBox" name="search" type="text">')
                $("#searchBtnDiv").html('<button class="searchBtn centerContent button" id = "searchHeaderBtn" type="submit">Search</button>');
                that.listenforHeader();
                
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
        searchByTitle(movieTitle.innerHTML).then(function(value)//This is a function as part of my IMDBAPI.js and is nessisary for the opperation of this programm 
        {
            displaySelected(value);
        });
    }
    function displaySelected(data)
    {
        $("#media-search-results").load("view/searchresults/html/selectedmovie.html", function()
        {
            document.getElementById("movieTitle").innerHTML = data.Title;
            document.getElementById("moviePoster").src = data.Poster
            document.getElementById("moviePlot").innerHTML = data.Plot;
            // document.getElementById("movieInfo").innerHTML = "Release Date: "+ data.Year +" Directed By: "+ data.Director + "Genre :" + data.Genre;
            
            document.cookie = "movieTitle = " + "" + data.Title; 
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
            document.getElementsByClassName("star")[i].src = "view/img/star.png";
            i--;
        }
    }
    function clearStarsToGrey(allStars)
    {
        i = allStars;
        while (i >= 0)
        {
            document.getElementsByClassName("star")[i].src = "view/img/stargray.png";
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
