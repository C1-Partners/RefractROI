


document.addEventListener("DOMContentLoaded", function() { 

    const 
        form = document.getElementById('formFloat'),
        close = document.getElementById('flfClose'),
        gform = document.getElementById('gform_13');

    let text = document.querySelector('.flf__text');

    // Toggle form after 3 seconds
    setTimeout(() => {
        toggleFormFloat();
    }, 6000);


    // Toggle form float
    const toggleFormFloat = () => {
        if (!form.classList.contains('show-flf')) {
            form.classList.add('show-flf');
        } else {
            form.classList.remove('show-flf');
        }
    }

    const closeDownFormKindly = () => {
        text.innerHTML = "No Problem! We're here if you need us."
        setTimeout(() => {
            toggleFormFloat();
        }, 2000);
        
    }
    // event listner for close
    if (form) {
        close.addEventListener('click', closeDownFormKindly);
    }

});