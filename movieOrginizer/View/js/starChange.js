var starChange = document.getElementsByClassName("starImg");
var i=0;
while (i<=4)
{
    starChange[i].addEventListener("mouseenter", starGold);
    i++;
}
var j=0;
while (j<=4)
{
    starChange[j].addEventListener("mouseleave", starGray);
    j++;
}
var k=0;
while (k<=4)
{
    starChange[k].addEventListener("click", starGoldClick);
    k++;
}
function starGold()
{
    var starID = event.srcElement.id;
    var starNum = starID.charAt(starID.length-1)
    switch(starNum)
    {
        case "0":
            starChange[0].src = "View/img/star.png";
            break;
        case "1":
            starChange[0].src = "View/img/star.png";
            starChange[1].src = "View/img/star.png";
            break;
        case "2":
            starChange[0].src = "View/img/star.png";
            starChange[1].src = "View/img/star.png";
            starChange[2].src = "View/img/star.png";
            break;
        case "3":
            starChange[0].src = "View/img/star.png";
            starChange[1].src = "View/img/star.png";
            starChange[2].src = "View/img/star.png";
            starChange[3].src = "View/img/star.png";
            break;
        case "4":
            starChange[0].src = "View/img/star.png";
            starChange[1].src = "View/img/star.png";
            starChange[2].src = "View/img/star.png";
            starChange[3].src = "View/img/star.png";
            starChange[4].src = "View/img/star.png";
            break;
    }
}

function starGray()
{
    var starID = event.srcElement.id;
    var starNum = starID.charAt(starID.length-1)
    switch(starNum)
    {
        case "0":
            starChange[0].src = "View/img/stargray.png";
            break;
        case "1":
            starChange[0].src = "View/img/stargray.png";
            starChange[1].src = "View/img/stargray.png";
            break;
        case "2":
            starChange[0].src = "View/img/stargray.png";
            starChange[1].src = "View/img/stargray.png";
            starChange[2].src = "View/img/stargray.png";
            break;
        case "3":
            starChange[0].src = "View/img/stargray.png";
            starChange[1].src = "View/img/stargray.png";
            starChange[2].src = "View/img/stargray.png";
            starChange[3].src = "View/img/stargray.png";
            break;
        case "4":
            starChange[0].src = "View/img/stargray.png";
            starChange[1].src = "View/img/stargray.png";
            starChange[2].src = "View/img/stargray.png";
            starChange[3].src = "View/img/stargray.png";
            starChange[4].src = "View/img/stargray.png";
            break;
    }
}
function starGoldClick()
{
    
}
