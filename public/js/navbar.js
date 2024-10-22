const hamburgerBtn = document.getElementById('hamburger-btn'); 
const navItems = document.getElementById('nav-items'); 

let isMobileNavActive = false; 

hamburgerBtn.addEventListener('click', function() {
    hamburgerBtn.classList.toggle('active');
    navItems.classList.toggle('active');
    isMobileNavActive = hamburgerBtn.classList.contains('active'); // Update state
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        navItems.classList.remove('active');
        hamburgerBtn.classList.remove('active');
    } else {
        if (isMobileNavActive) {
            hamburgerBtn.classList.add('active');
            navItems.classList.add('active');
        }
    }
});
