    const phrases = ['Full Stack Developer.', 'Software Engineer.', 'UI/UX Designer.'];
    let index = 0;
    let letterIndex = 0;
    let direction = 1; // 1 for typing, -1 for erasing
    let delay = 100; // typing speed

    function typeEffect() {
        const currentPhrase = phrases[index];
        const typingText = document.getElementById('typing-text');
        typingText.textContent = currentPhrase.substring(0, letterIndex);
        
        if (direction === 1) {
            if (letterIndex === currentPhrase.length) {
                direction = -1;
                setTimeout(typeEffect, 1500); // delay before erasing
            } else {
                letterIndex++;
                setTimeout(typeEffect, delay);
            }
        } else {
            if (letterIndex === 0) {
                direction = 1;
                index = (index + 1) % phrases.length;
                setTimeout(typeEffect, 500); // delay before typing the next phrase
            } else {
                letterIndex--;
                setTimeout(typeEffect, delay);
            }
        }
    }

    // Start the typing effect
    typeEffect();

