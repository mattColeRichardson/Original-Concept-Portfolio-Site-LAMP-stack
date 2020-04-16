var deleteBtns = document.querySelectorAll(".deleteRating");
deleteBtns.forEach(function(button)
{
    button.addEventListener("click" , function()
    {
        console.log(button.id);
        $.ajax({
            type: "POST",
            url: "controller/deletereview.php",
            data: {ratingID:button.id},
            success: function(result)
            {
                location.reload();
            }
        });
    });
    button.id;
});
