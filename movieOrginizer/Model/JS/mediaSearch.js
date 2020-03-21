function mediaSearch()
{
    this.searchBtn = document.getElementById("searchBtn");
    this.searchBox = document.getElementById("movieSearchBox");

    this.searchBtnXS = document.getElementById("searchBtnXS");
    this.searchBoxXS = document.getElementById("searchBoxXS");
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

        this.searchBtnXS.addEventListener("click", this.search);
        this.searchBoxXS.addEventListener("keypress", this.search);

    }
    this.search = function()
    {
        if (event.which === 13 || event.which === 1)
        {
            userSearch = that.searchBox.value;
            userSearchXS = that.searchBoxXS.value;
            if (userSearch == "")
            {
                getMovie(userSearchXS).then(function(value)
                {
                    postResults(value);
                });
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
        $("#media-search-results").load("view/Html/media-search", function()
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
        var selectMe = document.getElementsByClassName("selectMovie");
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
        $("#media-search-results").load("View/Html/SelectedMovie.html", function()
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
        that.starChange = document.getElementsByClassName("starImg");
        var i=0;
        while (i<=4)
        {
            that.starChange[i].addEventListener("mouseenter", that.starGold);
            i++;
        }
        var j=0;
        while (j<=4)
        {
            that.starChange[j].addEventListener("mouseleave", that.starGray);
            j++;
        }
        var k=0;
        while (k<=4)
        {
            that.starChange[k].addEventListener("mousedown", that.starGoldClick);
            k++;
        }
    }
    this.starGold = function()
    {
        {
            var starID = event.srcElement.id;
            var starNum = starID.charAt(starID.length -1) 
            switch(starNum)
            {
                case "1":
                    that.starChange[0].src = "View/img/star.png";
                    break;
                case "2":
                    that.starChange[0].src = "View/img/star.png";
                    that.starChange[1].src = "View/img/star.png";
                    break;
                case "3":
                    that.starChange[0].src = "View/img/star.png";
                    that.starChange[1].src = "View/img/star.png";
                    that.starChange[2].src = "View/img/star.png";
                    break;
                case "4":
                    that.starChange[0].src = "View/img/star.png";
                    that.starChange[1].src = "View/img/star.png";
                    that.starChange[2].src = "View/img/star.png";
                    that.starChange[3].src = "View/img/star.png";
                    break;
                case "5":
                    that.starChange[0].src = "View/img/star.png";
                    that.starChange[1].src = "View/img/star.png";
                    that.starChange[2].src = "View/img/star.png";
                    that.starChange[3].src = "View/img/star.png";
                    that.starChange[4].src = "View/img/star.png";
                    break;
            }
        }
    }
    this.starGray = function()
    {
        {
            var starID = event.srcElement.id;
            var starNum = starID.charAt(starID.length-1)
            switch(starNum)
            {
                case "1":
                    that.starChange[0].src = "View/img/stargray.png";
                    break;
                case "2":
                    that.starChange[0].src = "View/img/stargray.png";
                    that.starChange[1].src = "View/img/stargray.png";
                    break;
                case "3":
                    that.starChange[0].src = "View/img/stargray.png";
                    that.starChange[1].src = "View/img/stargray.png";
                    that.starChange[2].src = "View/img/stargray.png";
                    break;
                case "4":
                    that.starChange[0].src = "View/img/stargray.png";
                    that.starChange[1].src = "View/img/stargray.png";
                    that.starChange[2].src = "View/img/stargray.png";
                    that.starChange[3].src = "View/img/stargray.png";
                    break;
                case "5":
                    that.starChange[0].src = "View/img/stargray.png";
                    that.starChange[1].src = "View/img/stargray.png";
                    that.starChange[2].src = "View/img/stargray.png";
                    that.starChange[3].src = "View/img/stargray.png";
                    that.starChange[4].src = "View/img/stargray.png";
                    break;
            }
        }
    }
    this.starGoldClick = function()
    { 
        document.cookie = "selectedRating = " + "" + event.target.id;
    }
    
}