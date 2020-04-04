var deleteBtns = document.querySelectorAll(".deleteRating");
deleteBtns.forEach(function(button)
{
    button.addEventListener("click" , function()
    {
        $.ajax({
            type: "POST",
            url: "Controller/deleteReview.php",
            data: {ratingID:button.id},
            success: function(result)
            {
                alert(result);
            }
        });
    });
    button.id;
});
