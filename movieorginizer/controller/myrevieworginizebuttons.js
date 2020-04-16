function Review()
{
    this.title;
    this.rating;
    this.review;
    this.deleteBtn;
}
var isSortedBy;
var arrOfReviews = [];
var Boxes = document.querySelectorAll(".userData");
var amountOfBoxes = Boxes.length;
var i = 0;
let title;
let rating;
let review;
let type;
Boxes.forEach(function(data)
{
    switch(i)
    {
        case 0:
            if(amountOfBoxes % 3 == 0)
            {
                if (amountOfBoxes != Boxes.length)
                {
                    pushToArray(title, rating, review);//this needs to happen not the first time but every time after that that is has been good go 3 times.
                }
            }
            title = data.textContent;
            i++;
            amountOfBoxes--;
            break;
        case 1:
            rating = data.textContent;
            i++;
            amountOfBoxes--;
            break;
        case 2:
            review = data.textContent;
            i=0;
            amountOfBoxes--;
            break;   
    }
    if (amountOfBoxes == 0)
    {
        pushToArray(title, rating, review);
        addOtherAttributes();
        console.log(arrOfReviews);
    }
});
function pushToArray(title, rating, review)
{
    arrOfReviews.push({title:title, rating:rating, review:review});
}
function addOtherAttributes()
{
    let x = 0;
    document.querySelectorAll(".deleteRating").forEach(function(data)
    {
        arrOfReviews[x].deleteBtn = data.id;
        x++;
    });
    x = 0;
    document.querySelectorAll(".mediaType").forEach(function(data)
    {
        arrOfReviews[x].type = data.id;
        x++;
    });
    x = 0;
    document.querySelectorAll("#DateAndTime").forEach(function(data)
    {
        arrOfReviews[x].date = data.className;
        x++;
    });
}
$("#showsort").click(function (e) { 
    if(isSortedBy != "show")
    {
        e.preventDefault();
        $(".reviewTable").empty();
        console.log("Show has been sorted");
        isSortedBy = "show"; 
        sortAllTheThings(isSortedBy);
        $("#reviewSection").load("view/htmltemplates/sortedreviews.html", function()
        {
            displayAllTheThings();
        });
        
    }
});
$("#moviesort").click(function (e) { 
    if(isSortedBy != "movie")
    {
        e.preventDefault();
        $(".reviewTable").empty();
        console.log("Movie has been sorted");
        isSortedBy = "movie";
        sortAllTheThings(isSortedBy);
        $("#reviewSection").load("view/htmltemplates/sortedreviews.html", function()
        {
            displayAllTheThings();
        });
    }
});
$("#favsort").click(function (e) { 
    if(isSortedBy != "fav")
    {
        e.preventDefault();
        $(".reviewTable").empty();
        console.log("Fav has been sorted");
        isSortedBy = "fav";
        sortAllTheThings(isSortedBy);
        $("#reviewSection").load("view/htmltemplates/sortedreviews.html", function()
        {
            displayAllTheThings();
        });
    }
});
$("#worstsort").click(function (e) { 
    if(isSortedBy != "worst")
    {
        e.preventDefault();
        $(".reviewTable").empty();
        console.log("Worst has been sorted");
        isSortedBy = "worst";
        sortAllTheThings(isSortedBy);
        $("#reviewSection").load("view/htmltemplates/sortedreviews.html", function()
        {
            displayAllTheThings();
        });
    }
});
function sortAllTheThings(isSortedBy)
{
    switch(isSortedBy)
    {
        case "show":
            arrOfReviews.sort((a,b) => (a.type < b.type  || a.title > b.title) ? 1: -1)
            console.log(arrOfReviews);
            break;
        case "movie":
            arrOfReviews.sort((a,b) => (a.type > b.type  || a.title > b.title) ? 1: -1)
            console.log(arrOfReviews);
            break;
        case "fav":
            arrOfReviews.sort((a,b) => (a.rating < b.rating || a.title > b.title) ? 1: -1)
            console.log(arrOfReviews);
            break;
        case "worst":
            arrOfReviews.sort((a,b) => (a.rating > b.rating || a.title > b.title) ? 1: -1)
            console.log(arrOfReviews);
            break;
    }
}
function displayAllTheThings()
{
    arrOfReviews.forEach(function(data)
    {
        $(".reviewData").append("<span class='userData' > " + data.title + " </span>" + 
        "<span class='userData' > " + data.rating + " </span>" + 
        "<span class='userData'> " + data.review + " </span>" + 
        "<button id="+ data.deleteBtn +" class='deleteRating' >Delete</button>");
    });
   $.getScript("controller/myreviewdeletebutton.js");
}
