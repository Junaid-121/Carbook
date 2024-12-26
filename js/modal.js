// Ouvrir la fenêtre modale avec les détails de la voiture
  document.querySelectorAll('.btn-primary').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const carTitle = this.closest('.car-wrap').querySelector('h2 a').textContent;

      // Remplir les détails de la voiture dans la modale
      document.getElementById('modal-car-title').textContent = carTitle;
      document.getElementById('modal-car-name').value = carTitle;

      // Afficher la modale
      document.getElementById('orderModal').style.display = 'block';
    });
  });

  // Fermer la fenêtre modale
  document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('orderModal').style.display = 'none';
  });

  // Fermer la modale en cliquant à l'extérieur
  window.onclick = function(event) {
    const modal = document.getElementById('orderModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
