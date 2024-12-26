	document.addEventListener('DOMContentLoaded', function() {
	  // Lorsque l'utilisateur clique sur un lien de page
	  document.querySelectorAll('.page-link').forEach(function(link) {
		link.addEventListener('click', function(e) {
		  e.preventDefault();
  
		  // Obtenir le numéro de page
		  let pageNumber = parseInt(this.getAttribute('data-page'));
  
		  // Afficher la page correspondante et masquer les autres
		  showPage(pageNumber);
		});
	  });
  
	  // Fonction pour afficher une page
	  function showPage(pageNumber) {
		// Masquer toutes les pages
		const pages = document.querySelectorAll('.ftco-section');
		pages.forEach(function(page) {
		  page.style.display = 'none';
		});
  
		// Afficher la page demandée
		const pageToShow = document.getElementById('page-' + pageNumber);
		if (pageToShow) {
		  pageToShow.style.display = 'block';
		}
	  }
  
	  // Afficher la première page par défaut
	  showPage(1);
	});








//     <script>
// 	// Récupérer le paramètre de recherche depuis l'URL
// 	const params = new URLSearchParams(window.location.search);
// 	const query = params.get('query') ? params.get('query').toLowerCase() : "";
  
// 	// Tous les éléments des sections de voitures
// 	const sections = document.querySelectorAll("section[id^='page']");
// 	const pagination = document.querySelector(".pagination");
  
// 	if (query) {
// 	  let found = false;
  
// 	  // Masquer toutes les sections et vérifier les correspondances
// 	  sections.forEach(section => {
// 		const cars = section.querySelectorAll(".car-wrap");
// 		let sectionHasMatch = false;
  
// 		cars.forEach(car => {
// 		  const carName = car.querySelector("h2 a").textContent.toLowerCase();
// 		  if (carName.includes(query)) {
// 			car.style.display = ""; // Afficher la voiture correspondante
// 			sectionHasMatch = true;
// 			found = true;
// 		  } else {
// 			car.style.display = "none"; // Masquer les voitures non correspondantes
// 		  }
// 		});
  
// 		// Masquer ou afficher la section en fonction des correspondances
// 		section.style.display = sectionHasMatch ? "" : "none";
// 	  });
  
// 	  // Si aucun résultat trouvé
// 	  if (!found) {
// 		const noResult = document.createElement("div");
// 		noResult.innerHTML = `<p style="text-align: center; font-size: 20px; margin-top: 20px;">
// 								Aucun résultat trouvé pour "<strong>${query}</strong>".
// 							  </p>`;
// 		document.body.insertBefore(noResult, sections[0]);
// 	  }
  
// 	  // Masquer la pagination pendant la recherche
// 	  if (pagination) pagination.style.display = "none";
// 	}
//   </script>