//pour l'image slider
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}


//La fonction traduction
function Traduire(){
  var donnetraduire = document.getElementById('container').value
  var languetraduite = document.getElementById('traduction').value;
	var languedorigine = document.getElementById('traduction').value;

	if (languedorigine == languetraduite) //On vérifie si les deux langues ne sont pas identiques
		{
		document.getElementById('informations').innerHTML = "La langue du texte et celle dans laquelle il doit être traduit sont identiques.";
		}
	else
		{
		google.language.translate(donnetraduire, languedorigine, languetraduite, 
		function(result) 
			{
			if (!result.error) 
				{
				var main = document.getElementById("container");
				main.innerHTML = result.translation;
				}
			});
		}
}

//Une fonction pour récupérer l'actualité
async function getDonnees() {
  const reponse = await axios.get("https://www.terre-net.fr/obs_actu")
  res= reponse.data
  
  console.log(res)
}
