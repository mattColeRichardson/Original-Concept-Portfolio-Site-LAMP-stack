var reviews = [];
var Boxes = document.querySelectorAll(".userData");
var amountOfBoxes = Boxes.length;
var i = 0;
Boxes.forEach(function(data)
{
    switch(i)
    {
        case 0:
            reviews.push(data.textContent);
            i++;
            amountOfBoxes--;
            break;
        case 1:
            reviews.push(data.textContent);
            i++;
            amountOfBoxes--;
            break;
        case 2:
            reviews.push(data.textContent);
            amountOfBoxes--;
            i=0;
            if(amountOfBoxes <= 0)
            {
                console.log(reviews);
            }
            break;   
    }
});
var placeToSpliceIn = 3;
document.querySelectorAll(".deleteRating").forEach(function(data)// For some reason this is not being called but the firs tone is... stepping through it just skipps at function
{
    reviews.splice(placeToSpliceIn,0,data.id);
    placeToSpliceIn = placeToSpliceIn + 3;
});
