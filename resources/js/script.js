const navSlide = () => {
    const burger = document.querySelector('.nav__burger');
    const navWrapper = document.querySelector('.nav__link-wrapper');
    const navLinks = document.querySelectorAll('.nav__link-wrapper-ul li');
    console.log(burger);
    // Toggle Nav Slide
    burger.addEventListener('click', () =>{
        navWrapper.classList.toggle('nav-active');

        // Animate Links
        navLinks.forEach((link,index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade .8s ease forwards ${index / 7  }s`;
            }
        })
    })
};

navSlide();
