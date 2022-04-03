function lock(orientation) {
    let de = document.documentElement;
    if (de.requestFullscreen) {de.requestFullscreen();} 
    else if (de.mozRequestFullScreen) { de.mozRequestFullScreen();} 
    else if (de.webkitRequestFullscreen) {de.webkitRequestFullscreen();}
    else if (de.msRequestFullScreen) { de.msRequestFullScreen(); }

    screen.orientation.lock(orientation);
}