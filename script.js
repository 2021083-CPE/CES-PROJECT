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
