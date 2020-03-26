async function getMovie(userSearch)
{
   var v = await $.get("http://www.omdbapi.com/?s=" + userSearch + "&apikey=68d4832c");
   return v;
}
async function searchByTitle(Title)
{
   var w = await $.get("http://www.omdbapi.com/?t=" + Title + "&apikey=68d4832c");
   return w;
}