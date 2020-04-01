var dropdown = document.querySelector("nav .dropdown");
var profile = document.querySelector("nav .account");

function menuFunc()
{
    if(dropdown.style.display == "none" || dropdown.style.display == "")
    {
        dropdown.style.display = "grid";
        profile.style.display = "none";
    }
    else
    {
        dropdown.style.display = "none";
    }
}
function dropdownFunc()
{
    if (profile.style.display == "none" || profile.style.display == "")
    {
        profile.style.display = "grid";
        dropdown.style.display = "none";
    }
    else{
        profile.style.display = "none";
    }
}
function clearThings()
{
    profile.style.display = "none";
    dropdown.style.display = "none";
}