 // JavaScript to toggle submenu visibility for all dropdowns
 const dropdowns = document.querySelectorAll('.dropdown');
 dropdowns.forEach(dropdown => {
     dropdown.addEventListener('click', function() {
         const submenu = this.nextElementSibling;

         // Close other open submenus
         document.querySelectorAll('.submenu').forEach(sub => {
             if (sub !== submenu) {
                 sub.style.display = 'none';
             }
         });

         // Toggle the clicked submenu
         submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
     });
 });

 function filterCards() {
     const input = document.getElementById('searchInput');
     const filter = input.value.toLowerCase();
     const cards = document.querySelectorAll('.card , .reports');

     cards.forEach(card => {
         const text = card.textContent || card.innerText;
         card.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
     });
 }

 document.getElementById('searchInput').addEventListener('keyup', function(event) {
     if (event.key === 'Enter') {
         filterCards(); 
     }
 });