let btn = document.getElementById('hamburgerbtn');
let mobileMenu = document.getElementById('mobileMenu');

// In case I need it
let switchStatus = false;


// Function to open menu if I click toggle button
btn.addEventListener('click', function () {
    if ($(this).is(':checked')) {
        mobileMenu.classList.toggle('active');
        switchStatus = false;
    } else {
        mobileMenu.classList.toggle('active');
        switchStatus = true;
    }
});


// Event to close the menu if its open and I resize the window
window.addEventListener('resize', function (event) {
    if ($(window).width() > 960) {
        mobileMenu.classList.remove('active');
    }
});

// projectBtn
let projectBtn = document.getElementById('projectBtn');

// function to scroll to project tab
projectBtn.addEventListener('click', function () {
    let projectTab = document.getElementById("projects");
    projectTab.scrollIntoView({left: 0, block: 'start', behavior: 'smooth'});
});

// contactBtn
let contactBtn = document.getElementById('contactBtn');

// function to scroll to contact tab
contactBtn.addEventListener('click', function () {
    let contactTab = document.getElementById('contactSection');
    contactTab.scrollIntoView({left: 0, block: 'start', behavior: 'smooth'})
})