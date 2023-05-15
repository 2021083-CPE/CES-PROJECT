const completedProjectsBtn = document.querySelector('.completed-projects-btn');
const completedProjectsDropdown = document.querySelector('.completed-projects-dropdown');

completedProjectsBtn.addEventListener('click', () => {
  completedProjectsDropdown.classList.toggle('show');
});

//mobile navigation
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if(bar && close) {
  close.style.display = 'none'; // Hide the "close" icon initially
  bar.addEventListener('click', () => {
    nav.classList.add('active');
    bar.style.display = 'none'; // Hide the "bars" icon
    close.style.display = 'block'; // Show the "close" icon
  });
  
  close.addEventListener('click', () => {
    nav.classList.remove('active');
    bar.style.display = 'block'; // Show the "bars" icon
    close.style.display = 'none'; // Hide the "close" icon
  });
}

/**
 * Scroll to Top 
 */

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
scrollFunction();
};

function scrollFunction() {
if (
document.body.scrollTop > 20 ||
document.documentElement.scrollTop > 20
) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}
// end of scroll to top

// Wrap every letter in a span
var textWrapper = document.querySelector('.ml12');
var communityConnectText = document.getElementById('communityConnectText');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
communityConnectText.innerHTML = communityConnectText.textContent.replace(/\S/g, "<span class='letter'>$&</span>"); // Add this line to apply animation to #communityConnectText

anime.timeline({loop: true})
  .add({
    targets: '.ml12 .letter, #communityConnectText .letter', // Update the targets to include #communityConnectText
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.ml12 .letter, #communityConnectText .letter', // Update the targets to include #communityConnectText
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 500 + 30 * i
  });
  const section = document.querySelector('.section-mission-vision');
  const goals = document.querySelector('#goals-container');
  
  const options = {
    threshold: 0.2,
  };
  
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, options);
  
  observer.observe(section);
  observer.observe(goals);

// Close the dropdown if
// Close the dropdown if the user clicks outside of it
window.addEventListener('click', (event) => {
  if (!event.target.matches('.completed-projects-btn')) {
  completedProjectsDropdown.style.display = 'none';
  }
  });
  
  // When the user clicks on the button, toggle between hiding and showing the dropdown content
  completedProjectsBtn.addEventListener('click', (event) => {
  event.stopPropagation();
  completedProjectsDropdown.style.display = completedProjectsDropdown.style.display === 'block' ? 'none' : 'block';
  });
  
  // Close the dropdown when the user scrolls the page
  window.addEventListener('scroll', () => {
  completedProjectsDropdown.style.display = 'none';
  });



document.getElementById("joinBtn").addEventListener("click", function() {
document.getElementById("formContainer").style.display = "block";
});

