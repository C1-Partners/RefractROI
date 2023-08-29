document.addEventListener("DOMContentLoaded", function() {
    const 
        form = document.getElementById('formFloat'),
        close = document.getElementById('flfClose'),
        gform = document.getElementById('gform_13');

    let text = document.querySelector('.flf__text');

    // Check if form has been closed before
    if (localStorage.getItem('formClosed')) {
        form.style.display = 'none'; // Hide the form
    } else {
        // Toggle form after 3 seconds
        setTimeout(() => {
            toggleFormFloat();
        }, 6000);
    }

    // Toggle form float
    const toggleFormFloat = () => {
        if (!form.classList.contains('show-flf')) {
            form.classList.add('show-flf');
        } else {
            form.classList.remove('show-flf');
        }
    }

    const closeDownFormKindly = () => {
        text.innerHTML = "No Problem! We're here if you need us.";
        localStorage.setItem('formClosed', 'true'); // Set the flag
        setTimeout(() => {
            toggleFormFloat();
        }, 600);
    }

    // event listener for close
    if (form) {
        close.addEventListener('click', closeDownFormKindly);
    }

    document.addEventListener("gform_confirmation_loaded", function (e) {
        console.log('fired');
        text.innerHTML = "You may close this window at any point";
    });
});