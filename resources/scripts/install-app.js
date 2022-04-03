let deferredPrompt;

var addto = document.querySelector(".add-to");
var lockFunction =  window.screen.orientation.lock;

if (window.matchMedia('display-mode: standalone').matches) {
    addto.style.display = "none";
    
} else {
    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        addto.style.display = "block";

        addto.addEventListener('click', (e) => {
            // hide our user interface that shows our A2HS button
            addto.style.display = 'none';
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice
            .then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                console.log('User accepted the A2HS prompt');
                } else {
                console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
            });
        });
    });
};